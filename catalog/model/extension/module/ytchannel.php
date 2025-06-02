<?php
class ModelExtensionModuleYtchannel extends Model {

	public function getVideos($data) {
		$sql = "SELECT * FROM " . DB_PREFIX . "yt_video WHERE " . $this->db->escape($data['source']) . "_id = '" . $this->db->escape($data['source_id']) . "'";

		if (!empty($data['search'])) {
			$sql .= " AND title LIKE '%" . $this->db->escape($data['search']) . "%'";
		}

		$sort_data = [
			'date_added',
			'views',
			'likes',
			'comments'
		];

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'] . "  DESC";
		} elseif (isset($data['sort']) && $data['sort'] == 'title') {
			$sql .= " ORDER BY title ASC";
		} elseif (isset($data['sort']) && $data['sort'] == 'random') {
			$sql .= " ORDER BY rand()";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 12;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getTotalVideos($data) {
		$sql = "SELECT COUNT(video_id) as total FROM " . DB_PREFIX . "yt_video WHERE " . $this->db->escape($data['source']) . "_id = '" . $this->db->escape($data['source_id']) . "'";

		$query = $this->db->query($sql);

		return $query->row['total'];
	}

	public function getHeaderData($data) {
		$sql = "SELECT * FROM " . DB_PREFIX . "yt_" . $data['source'] . " WHERE " . $this->db->escape($data['source']) . "_id = '" . $this->db->escape($data['source_id']) . "'";

		$query = $this->db->query($sql);
		return $query->row;
	}

	public function updateVideo($videos, $playlist_id='') {
		foreach ($videos as $video) {
			$query = $this->db->query("SELECT COUNT(*) as total FROM " . DB_PREFIX . "yt_video WHERE video_id = '" . $this->db->escape($video['video_id']) . "'");
			
			if (!empty($query->row['total'])) {
				$sql = "UPDATE " .DB_PREFIX . "yt_video SET ";
			} else {
				$sql = "INSERT INTO " .DB_PREFIX . "yt_video SET video_id = '" . $this->db->escape($video['video_id']) . "', ";
			}

			if ($playlist_id) {
				$sql .= "playlist_id = '" . $this->db->escape($playlist_id) . "', ";
			}

			$sql .= "channel_id = '" . $this->db->escape($video['channel_id']) . "', title = '" . $this->db->escape($video['title']) . "', description = '" . $this->db->escape($video['description']) . "', thumb_default = '" . $this->db->escape($video['thumb_default']) . "', thumb_medium = '" . $this->db->escape($video['thumb_medium']) . "', thumb_high = '" . $this->db->escape($video['thumb_high']) . "', thumb_standard = '" . $this->db->escape($video['thumb_standard']) . "', thumb_maxres = '" . $this->db->escape($video['thumb_maxres']) . "', views = '" . (int)$video['views'] . "', likes = '" . (int)$video['likes'] . "', favorites = '" . (int)$video['favorites'] . "', comments = '" . (int)$video['comments'] . "', duration = '" . $this->db->escape($video['duration']) . "', date_added = '" . $this->db->escape($video['date_added']) . "'";

			if (!empty($query->row['total'])) {
				$sql .= " WHERE video_id = '" . $this->db->escape($video['video_id']) . "'";
			}
			
			$this->db->query($sql);
		}
	}
	
	public function updateChannel($channel) {

		$this->db->query("REPLACE " . DB_PREFIX . "yt_channel SET channel_id = '" . $this->db->escape($channel['channel_id']) . "', title = '" . $this->db->escape($channel['title']) . "', description = '" . $this->db->escape($channel['description']) . "', thumb_default = '" . $this->db->escape($channel['thumb_default']) . "', thumb_medium = '" . $this->db->escape($channel['thumb_medium']) . "', thumb_high = '" . $this->db->escape($channel['thumb_high']) . "', views = '" . (int)$channel['views'] . "', subscribers = '" . (int)$channel['subscribers'] . "', videos = '" . (int)$channel['videos'] . "'");
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "yt_video WHERE channel_id = '" . $this->db->escape($channel['channel_id']) . "' AND playlist_id = ''");

	}

	public function updatePlaylist($playlist) {

		$this->db->query("REPLACE " . DB_PREFIX . "yt_playlist SET playlist_id = '" . $this->db->escape($playlist['playlist_id']) . "', channel_id = '" . $this->db->escape($playlist['channel_id']) . "', title = '" . $this->db->escape($playlist['title']) . "', description = '" . $this->db->escape($playlist['description']) . "', thumb_default = '" . $this->db->escape($playlist['thumb_default']) . "', thumb_medium = '" . $this->db->escape($playlist['thumb_medium']) . "', thumb_high = '" . $this->db->escape($playlist['thumb_high']) . "', videos = '" . (int)$playlist['videos'] . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "yt_video WHERE playlist_id = '" . $this->db->escape($playlist['playlist_id']) . "'");

	}

}