<?php

require_once(DIR_SYSTEM . '/engine/neoseo_model.php');

class ModelBlogNeoSeoBlogComment extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
				$this->_modulePostfix = "_comment";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;

		
	}

	public function getTotalComments($data)
	{
		$sql = "SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "seo_blog_comment` WHERE status=1";

		if (!empty($data['filter_article_id'])) {
			$sql .= " AND article_id='" . (int) $data['filter_article_id'] . "'";
		}

		if (isset($data['filter_comment_reply_id'])) {
			$sql .= " AND comment_reply_id='" . (int) $data['filter_comment_reply_id'] . "'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function getComments($data)
	{
		$sql = "SELECT * FROM `" . DB_PREFIX . "seo_blog_comment` WHERE status=1";

		if (!empty($data['filter_article_id'])) {
			$sql .= " AND article_id='" . (int) $data['filter_article_id'] . "'";
		}

		if (!empty($data['filter_category_id'])) {
			$sql .= " AND article_id in ( select article_id from  `" . DB_PREFIX . "seo_blog_article_to_category` ba2c where ba2c.category_id = '" . (int) $data['filter_category_id'] . "')";
		}

		if (isset($data['filter_comment_reply_id'])) {
			$sql .= " AND comment_reply_id='" . (int) $data['filter_comment_reply_id'] . "'";
		}

		$sort_data = array(
			'date_added',
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY date_added";
		}

		if (isset($data['order']) && ($data['order'] == 'ASC')) {
			$sql .= " ASC";
		} else {
			$sql .= " DESC";
		}

		if (isset($data['start']) && !empty($data['limit'])) {

			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . " , " . (int) $data['limit'];
		}

		//echo $sql;
		$query = $this->db->query($sql);

		$comments = array();

		setlocale(LC_TIME, $this->config->get('config_language'));

		foreach ($query->rows as $row) {
			$row['date_added'] = strftime($this->config->get($this->_moduleSysName() . '_time_format'), strtotime($row['date_added']));
			$row['date_modified'] = strftime($this->config->get($this->_moduleSysName() . '_time_format'), strtotime($row['date_modified']));
			$comments[] = $row;
		}

		return $comments;
	}

	public function addComment($article_id, $data)
	{
		if (!empty($data['reply_id'])) {
			$reply_id = $data['reply_id'];
		} else {
			$reply_id = 0;
		}
		$this->db->query("INSERT INTO `" . DB_PREFIX . "seo_blog_comment` SET article_id='" . (int) $article_id . "', rating='" . (int) $data['rating'] . "',comment_reply_id='" . (int) $reply_id . "', author='" . $this->db->escape($data['name']) . "', comment='" . $this->db->escape($data['text']) . "', status='" . (int) $data['status'] . "', date_added=NOW(), date_modified=NOW()");

		$this->load->language('blog/' . $this->_moduleSysName());
		$this->load->model('blog/' . $this->_moduleSysName . '_article');

		$article_info = $this->{"model_blog_" . $this->_moduleSysName . '_article'}->getArticle($article_id);

		$subject = sprintf($this->language->get('text_subject'), html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));

		$message = $this->language->get('text_waiting') . "\n";
		$message .= sprintf($this->language->get('text_article'), html_entity_decode($article_info['name'], ENT_QUOTES, 'UTF-8')) . "\n";
		$message .= sprintf($this->language->get('text_reviewer'), html_entity_decode($data['name'], ENT_QUOTES, 'UTF-8')) . "\n";
		$message .= sprintf($this->language->get('text_rating'), $data['rating']) . "\n";
		$message .= $this->language->get('text_review') . "\n";
		$message .= html_entity_decode($data['text'], ENT_QUOTES, 'UTF-8') . "\n\n";

		$mail = new Mail($this->config->get('config_mail_engine'));
		$mail->parameter = $this->config->get('config_mail_parameter');
		$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
		$mail->smtp_username = $this->config->get('config_mail_smtp_username');
		$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
		$mail->smtp_port = $this->config->get('config_mail_smtp_port');
		$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

		$mail->setTo($this->config->get('config_email'));
		$mail->setFrom($this->config->get('config_email'));
		$mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
		$mail->setSubject($subject);
		$mail->setText($message);
		$mail->send();

		// Send to additional alert emails
		$emails = explode(',', $this->config->get('config_mail_alert_email'));

		foreach ($emails as $email) {
			if ($email && preg_match($this->config->get('config_mail_regexp'), $email)) {
				$mail->setTo($email);
				$mail->send();
			}
		}
	}

	

}
