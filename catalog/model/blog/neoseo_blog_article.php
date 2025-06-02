<?php

require_once(DIR_SYSTEM . '/engine/neoseo_model.php');

class ModelBlogNeoSeoBlogArticle extends NeoSeoModel
{

	public function __construct($registry)
	{
		parent::__construct($registry);
		$this->_moduleSysName = 'neoseo_blog';
		$this->_modulePostfix = "_article";
		$this->_logFile = $this->_moduleSysName . '.log';
		$this->debug = $this->config->get($this->_moduleSysName . '_status') == 1;

		
	}

	public function updateViewed($article_id)
	{
		$this->db->query("UPDATE `" . DB_PREFIX . "seo_blog_article` SET viewed = (viewed + 1) WHERE article_id='" . (int) $article_id . "'");
	}

	public function getArticle($article_id)
	{
		$sql = "SELECT ba.*, ba.date_modified as article_date_modified, bad.*, bau.name AS author_name, bau.author_id AS author_id 
					FROM `" . DB_PREFIX . "seo_blog_article` ba LEFT JOIN `" . DB_PREFIX . "seo_blog_article_description` bad ON(ba.article_id=bad.article_id) 
						LEFT JOIN `" . DB_PREFIX . "seo_blog_article_to_store` bas ON(ba.article_id=bas.article_id) 
						LEFT JOIN `" . DB_PREFIX . "seo_blog_author` bau ON(ba.author_id=bau.author_id) 
						LEFT JOIN `" . DB_PREFIX . "seo_blog_article_to_category` bac ON(ba.article_id=bac.article_id) 
						LEFT JOIN `" . DB_PREFIX . "seo_blog_category` bc ON(bc.category_id=bac.category_id) 
					WHERE ba.article_id='" . (int) $article_id . "' 
						AND bau.status = 1 
						AND ba.status = 1 
						AND bas.store_id = '" . (int) $this->config->get('config_store_id') . "' 
						AND bad.language_id = '" . $this->config->get('config_language_id') . "'";

		$query = $this->db->query($sql);

		if (!$query->num_rows) {
			return array();
		}

		$query->row['date_added'] = strftime($this->config->get($this->_moduleSysName . '_time_format'), strtotime($query->row['date_added']));
		$query->row['date_modified'] = strftime($this->config->get($this->_moduleSysName . '_time_format'), strtotime($query->row['date_modified']));

		$this->load->model('blog' . '/' . $this->_moduleSysName . "_comment");
		$query->row['total_comments'] = $this->{"model_" . 'blog' . '_' . $this->_moduleSysName . "_comment"}->getTotalComments(array('filter_article_id' => $article_id));

		return $query->row;
	}

	public function getRating($article_id)
	{
		$sql = "SELECT AVG(rating) AS total FROM " . DB_PREFIX . "seo_blog_comment  WHERE article_id = " . (int) $article_id . " AND comment_reply_id = 0 AND status = 1 GROUP BY article_id";
		$query = $this->db->query($sql);
		if ($query->num_rows) {
			return $query->row['total'];
		} else {
			return 0;
		}
	}

	public function getTotalArticles($data = array())
	{
		$sql = "SELECT COUNT(ba.article_id) AS total FROM `" . DB_PREFIX . "seo_blog_article` ba JOIN `" . DB_PREFIX . "seo_blog_article_to_store` bas ON(ba.article_id=bas.article_id) ";

		if (!empty($data['filter_name'])) {
			$sql .= " JOIN `" . DB_PREFIX . "seo_blog_article_description` bad ON(ba.article_id=bad.article_id) ";
		}

		if (!empty($data['filter_author_id'])) {
			$sql .= " JOIN `" . DB_PREFIX . "seo_blog_author` bau ON(ba.author_id=bau.author_id) ";
		}

		if (!empty($data['filter_category_id'])) {
			$sql .= " JOIN `" . DB_PREFIX . "seo_blog_article_to_category` bac ON(ba.article_id=bac.article_id)
				 JOIN `" . DB_PREFIX . "seo_blog_category` bc ON(bc.category_id=bac.category_id) ";
		}

		$sql .= " WHERE ba.status=1 AND bas.store_id='" . (int) $this->config->get('config_store_id') . "' ";

		if (!empty($data['filter_author_id'])) {
			$sql .= " AND bau.status=1 AND ba.author_id='" . (int) $data['filter_author_id'] . "'";
		}

		if (!empty($data['filter_name'])) {
			$sql .= " 
			AND bad.language_id='" . $this->config->get('config_language_id') . "' 
			AND bad.name LIKE '%" . $this->db->escape($data['filter_name']) . "%'
			";
		}


		if (!empty($data['filter_category_id'])) {
			$sql .= " AND bac.category_id='" . (int) $data['filter_category_id'] . "'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	function getArticles($data)
	{
		$articles = array();

		$sql = "SELECT ba.article_id FROM `" . DB_PREFIX . "seo_blog_article` ba 
				 JOIN `" . DB_PREFIX . "seo_blog_article_to_store` bas ON( ba.article_id = bas.article_id )
				 JOIN `" . DB_PREFIX . "seo_blog_article_description` bad ON(ba.article_id=bad.article_id) ";

		if (!empty($data['filter_author_id'])) {
			$sql .= " JOIN `" . DB_PREFIX . "seo_blog_author` bau ON(ba.author_id=bau.author_id) ";
		}

		if (!empty($data['filter_category_id'])) {
			$sql .= " JOIN `" . DB_PREFIX . "seo_blog_article_to_category` bac ON(ba.article_id=bac.article_id)
				 JOIN `" . DB_PREFIX . "seo_blog_category` bc ON(bc.category_id=bac.category_id) ";
		}

		$sql .= " WHERE ba.status=1 
					AND bas.store_id='" . (int) $this->config->get('config_store_id') . "'
					AND bad.language_id='" . $this->config->get('config_language_id') . "' ";

		if (!empty($data['filter_author_id'])) {
			$sql .= " AND bau.status=1 AND ba.author_id='" . (int) $data['filter_author_id'] . "'";
		}

		if (!empty($data['filter_category_id'])) {
			$sql .= " AND bac.category_id='" . (int) $data['filter_category_id'] . "'";
		}


		if (!empty($data['filter_name'])) {
			$sql .= " 
			AND bad.language_id='" . $this->config->get('config_language_id') . "' 
			AND bad.name LIKE '%" . $this->db->escape($data['filter_name']) . "%'
			";
		}

		$sort_data = array(
			'bad.name',
			'ba.date_added',
			'ba.date_modified',
			'ba.sort_order',
			'ba.viewed'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];

			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
			}
		} else {
			$sql .= " ORDER BY ba.sort_order ";

			if (isset($data['order']) && ($data['order'] == 'DESC')) {
				$sql .= " DESC";
			} else {
				$sql .= " ASC";
			}

			$sql .= ", ba.date_added DESC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$query = $this->db->query($sql);

		foreach ($query->rows as $row) {
			$articles[] = $this->getArticle($row['article_id']);
		}

		return $articles;
	}

	public function getCategories($article_id)
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "seo_blog_article_to_category` WHERE article_id='" . (int) $article_id . "'");

		$categories = array();

		$this->load->model('blog' . '/' . $this->_moduleSysName . '_category');

		foreach ($query->rows as $result) {
			$categories[$result['category_id']] = $this->{"model_" . 'blog' . '_' . $this->_moduleSysName . '_category'}->getCategory($result['category_id']);
		}

		return $categories;
	}

	public function getMainCategory($article_id)
	{
		$query = $this->db->query("SELECT category_id FROM " . DB_PREFIX . "seo_blog_article_to_category WHERE article_id = '" . (int) $article_id . "' AND main_category = '1' LIMIT 1");

		if ($query->num_rows) {
			$this->load->model('blog' . '/' . $this->_moduleSysName . '_category');
			return $this->{"model_" . 'blog' . '_' . $this->_moduleSysName . '_category'}->getCategory($query->row['category_id']);
		}
		return false;
	}

	public function getRelatedProducts($article_id)
	{
		$sql = "SELECT * FROM `" . DB_PREFIX . "seo_blog_article_related_product` WHERE article_id='" . (int) $article_id . "'";
		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function getRelatedProductsFiltered($article_id, $data)
	{
		$sql = "SELECT * FROM `" . DB_PREFIX . "seo_blog_article_related_product` WHERE article_id='" . (int) $article_id . "'";

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 5;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$query = $this->db->query($sql);
		return $query->rows;
	}

	public function getRelatedArticles($article_id)
	{
		$articles = array();

		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "seo_blog_article_related_article` WHERE article_id='" . (int) $article_id . "' AND status=1 ORDER BY sort_order");

		foreach ($query->rows as $row) {

			$article = $this->getArticle($row['related_id']);

			if ($article) {
				$articles[] = $article;
			}
		}

		return $articles;
	}

	public function getFeaturedArticles($product_id)
	{
		$articles = array();
		$query = $this->db->query("SELECT category_id FROM `" . DB_PREFIX . "product_to_category` WHERE product_id = '" . (int) $product_id . "'AND main_category = 1");
		if (isset($query->row['category_id']))
			$category_id = $query->row['category_id'];
		else
			return $articles;

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_category_to_blog_article WHERE category_id = '" . (int) $category_id . "'");

		foreach ($query->rows as $result) {
			$articles[] = $result['article_id'];
		}

		return $articles;
	}

	public function getArticleLayoutId($article_id)
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "seo_blog_article_to_layout WHERE article_id = '" . (int) $article_id . "' AND store_id = '" . (int) $this->config->get('config_store_id') . "'");

		if ($query->num_rows) {
			return $query->row['layout_id'];
		} else {
			return 0;
		}
	}

	

}
