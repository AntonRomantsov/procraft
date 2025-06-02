<?php
class ControllerExtensionModuleYtchannel extends Controller {

	public function index($setting) {
		if ($setting['status']) {
			$data = $this->load->language('extension/module/ytchannel');

			$this->load->model('extension/module/ytchannel');

			if ($setting['layout'] == 'carousel') {
				$this->document->addStyle('catalog/view/javascript/jquery/swiper/css/swiper.min.css');
				$this->document->addStyle('catalog/view/javascript/jquery/swiper/css/opencart.css');
				$this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.jquery.min.js');
			}

			$this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');
			$this->document->addStyle('catalog/view/theme/default/stylesheet/ytchannel.css');

			$data['heading_title'] = $setting['title'][$this->config->get('config_language_id')];
			$data['columns'] = $setting['columns'];
			$data['limit'] = $setting['limit'];
			$data['loadmore'] = $setting['loadmore'];
			$data['fullscreen'] = $setting['fullscreen'];
			$data['branding'] = $setting['branding'];
			$data['video_setting'] = !empty($setting['video_setting']) ? $setting['video_setting'] : [];
			$data['header_setting'] = !empty($setting['header_setting']) ? $setting['header_setting'] : [];
			$data['module_id'] = isset($setting['module_id']) ? $setting['module_id'] : rand(99,999);

			if ($setting['channel']) {
				$data['subscribe_link'] = 'https://www.youtube.com/channel/'.$setting['channel'].'?sub_confirmation=1&feature=subscribe-embed-click';
			} else {
				$data['subscribe_link'] = '';
			}

			$data['videos'] = [];

			$filter_data = [
				'source' => $setting['source'],
				'source_id' => $setting[$setting['source']],
				'sort' => $setting['sort'],
				'start' => 0,
				'limit' => $setting['limit']
			];

			$data['header_data'] = [];
			$header_data = $this->model_extension_module_ytchannel->getHeaderData($filter_data);
			if ($header_data) {
				$data['header_data'] = [
					'title' => $header_data['title'],
					'description' => $header_data['description'],
					'thumb' => $header_data['thumb_default'],
					'videos' => !empty($header_data['videos']) ? $this->shortNumber($header_data['videos']) : '',
					'views' => !empty($header_data['views']) ? $this->shortNumber($header_data['views']) : '',
					'subscribers' => !empty($header_data['subscribers']) ? $this->shortNumber($header_data['subscribers']) : ''
				];
			}

			$data['total'] = $this->model_extension_module_ytchannel->getTotalVideos($filter_data);

			$results = $this->model_extension_module_ytchannel->getVideos($filter_data);

			if (empty($results)) {
				$getdata = [
					'key' => $setting['apikey'],
					'source' => $setting['source'],
					'source_id' => $setting[$setting['source']]
				];
				$this->load->controller('extension/module/ytchannel/update', $getdata);
				$results = $this->model_extension_module_ytchannel->getVideos($filter_data);
			}

			$replace_from = ['"', "\r", "\n"];
			$replace_to = ['', '', ''];

			foreach ($results as $result) {
				$data['videos'][] = [
					'video_id' => $result['video_id'],
					'title' => $result['title'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'thumb' => $result['thumb_'.$setting['image']],
					'date' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
					'views' => $this->shortNumber($result['views']),
					'likes' => $this->shortNumber($result['likes']),
					'comments' => $this->shortNumber($result['comments']),
					'duration' => $this->convertDuration($result['duration']),
					'duration_micro' => $result['duration'],
					'date_micro' => date('Y-m-d\TH:i:sP', strtotime($result['date_added'])),
					'description_micro' => str_replace($replace_from, $replace_to, strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')))
				];
			}
			
			return $this->load->view('extension/module/ytchannel_'.$setting['layout'], $data);
		}
	}

	public function loadmore() {
		if (empty($this->request->post['limit'])) {
			$this->response->redirect($this->url->link('common/home'));
			exit;
		}
	
		$this->load->model('setting/module');
		if ($this->request->server['REQUEST_METHOD'] == 'POST' && !empty($this->request->post['module_id'])) {
			$setting = $this->model_setting_module->getModule((int)$this->request->post['module_id']);
		} else {
			$setting = ['status' => 0];
		}
		
		if ($setting['status']) {

			$data = $this->load->language('extension/module/ytchannel');

			$this->load->model('extension/module/ytchannel');

			$data['module_id'] = $setting['module_id'];
			$data['limit'] = $setting['limit'];
			$data['columns'] = $setting['columns'];
			$data['fullscreen'] = $setting['fullscreen'];
			$data['branding'] = $setting['branding'];
			$data['video_setting'] = !empty($setting['video_setting']) ? $setting['video_setting'] : [];
			$data['header_setting'] = !empty($setting['header_setting']) ? $setting['header_setting'] : [];
			$data['is_loadmore'] = 1;

			$data['videos'] = [];

			$filter_data = [
				'search' => !empty($this->request->post['search']) ? (string)$this->request->post['search'] : '',
				'source' => $setting['source'],
				'source_id' => $setting[$setting['source']],
				'sort' => $setting['sort'],
				'start' => (int)$this->request->post['start'],
				'limit' => (int)$this->request->post['limit']
			];

			$results = $this->model_extension_module_ytchannel->getVideos($filter_data);

			foreach ($results as $result) {
				$data['videos'][] = [
					'video_id' => $result['video_id'],
					'title' => $result['title'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'thumb' => $result['thumb_'.$setting['image']],
					'date' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
					'views' => $this->shortNumber($result['views']),
					'likes' => $this->shortNumber($result['likes']),
					'favorites' => $this->shortNumber($result['favorites']),
					'comments' => $this->shortNumber($result['comments']),
					'duration' => $this->convertDuration($result['duration'])
				];
			}

			$this->response->setOutput($this->load->view('extension/module/ytchannel_'.$setting['layout'], $data));

		}
	}

	public function update($data = []) {

		set_time_limit(0);

		$json = array();

		if (!empty($data)) {
			$this->request->get = $data;
		}

		$language = $this->load->language('extension/module/ytchannel');

		if (!empty($this->request->get['key']) && $this->request->get['key'] == $this->config->get('module_ytchannel_apikey') && !empty($this->request->get['source_id'])) {

			$this->load->model('extension/module/ytchannel');

			require 'system/library/ytchannel/autoload.php';
			$youtube = new Madcoda\Youtube\Youtube(['key' => $this->request->get['key'], 'referer' => HTTPS_SERVER]);

			$maxResults = 50;
			$page_info = true;

			$this->request->get['source_id'] = rawurldecode($this->request->get['source_id']);

			if ($this->request->get['source'] == 'channel') {

				$channel = $youtube->getChannelById($this->request->get['source_id']);
				
				if ($channel) {

					$channel_data = [];
					$channel_data['channel_id'] = $this->request->get['source_id'];
					$channel_data['title'] = $channel->snippet->title;
					$channel_data['description'] = $channel->snippet->description;
					$channel_data['thumb_default'] = isset($channel->snippet->thumbnails->default->url)?$channel->snippet->thumbnails->default->url:'';
					$channel_data['thumb_medium'] = isset($channel->snippet->thumbnails->medium->url)?$channel->snippet->thumbnails->medium->url:'';
					$channel_data['thumb_high'] = isset($channel->snippet->thumbnails->high->url)?$channel->snippet->thumbnails->high->url:'';
					$channel_data['views'] = $channel->statistics->viewCount;
					$channel_data['subscribers'] = $channel->statistics->subscriberCount;
					$channel_data['videos'] = $channel->statistics->videoCount;

					if (!empty($channel_data)) {
						$this->model_extension_module_ytchannel->updateChannel($channel_data);
					}

					$totalVideo = intval($channel->statistics->videoCount);
					$maxParts = ceil($totalVideo / $maxResults);

					$params = [
						'channelId' => $this->request->get['source_id'],
						'type' => 'video',
						'part' => 'id',
						'order' => 'date',
						'q' => '',
						'maxResults' => $maxResults
					];

					$videoItems = $youtube->searchAdvanced($params, $page_info);
					$video_ids = [];

					if (!empty($videoItems['results'])) {
						foreach ($videoItems['results'] as $item) {
							$video_ids[] = $item->id->videoId;
						}
					}

					$videos = $this->getVideos($youtube, $video_ids);
					if (!empty($videos)) {
						$this->model_extension_module_ytchannel->updateVideo($videos);
					}

					for ($i=1; $i < $maxParts; $i++) {
						$video_ids = [];
						$videos = [];
						if (!empty($videoItems['info']['nextPageToken'])) {
							$params['pageToken'] = $videoItems['info']['nextPageToken'];
							$videoItems = $youtube->searchAdvanced($params, $page_info);
							if (!empty($videoItems['results'])) {
								foreach ($videoItems['results'] as $item) {
									$video_ids[] = $item->id->videoId;
								}

								$videos = $this->getVideos($youtube, $video_ids);
								if (!empty($videos)) {
									$this->model_extension_module_ytchannel->updateVideo($videos);
								}
							}
						}
					}

				}

			} elseif ($this->request->get['source'] == 'playlist') {

				$playlist = $youtube->getPlaylistById($this->request->get['source_id']);

				if ($playlist) {

					$playlist_data = [];
					$playlist_data['playlist_id'] = $this->request->get['source_id'];
					$playlist_data['channel_id'] = '';
					$playlist_data['title'] = $playlist->snippet->title;
					$playlist_data['description'] = $playlist->snippet->description;
					$playlist_data['thumb_default'] = isset($playlist->snippet->thumbnails->default->url)?$playlist->snippet->thumbnails->default->url:'';
					$playlist_data['thumb_medium'] = isset($playlist->snippet->thumbnails->medium->url)?$playlist->snippet->thumbnails->medium->url:'';
					$playlist_data['thumb_high'] = isset($playlist->snippet->thumbnails->high->url)?$playlist->snippet->thumbnails->high->url:'';

					$params = [
						'playlistId' => $this->request->get['source_id'],
						'part' => 'contentDetails',
						'maxResults' => $maxResults
					];

					$videoItems = $youtube->getPlaylistItemsByPlaylistIdAdvanced($params, $page_info);
					
					$totalVideo = intval($videoItems['info']['totalResults']);
					$maxParts = ceil($totalVideo / $maxResults);

					$playlist_data['videos'] = $totalVideo;

					if (!empty($playlist_data)) {
						$this->model_extension_module_ytchannel->updatePlaylist($playlist_data);
					}

					$videos = [];

					$video_ids = [];
					if (!empty($videoItems['results'])) {
						foreach ($videoItems['results'] as $item) {
							$video_ids[] = $item->contentDetails->videoId;
						}
					}

					$videos = $this->getVideos($youtube, $video_ids);
					if (!empty($videos)) {
						$this->model_extension_module_ytchannel->updateVideo($videos, $this->request->get['source_id']);
					}

					for ($i=1; $i < $maxParts; $i++) {
						$video_ids = [];
						$videos = [];
						if (!empty($videoItems['info']['nextPageToken'])) {
							$params['pageToken'] = $videoItems['info']['nextPageToken'];
							$videoItems = $youtube->getPlaylistItemsByPlaylistIdAdvanced($params, $page_info);
							if (!empty($videoItems['results'])) {
								foreach ($videoItems['results'] as $item) {
									$video_ids[] = $item->contentDetails->videoId;
								}

								$videos = $this->getVideos($youtube, $video_ids);
								if (!empty($videos)) {
									$this->model_extension_module_ytchannel->updateVideo($videos, $this->request->get['source_id']);
								}
							}
						}
					}
					
				}

			} else {

				$video_ids = [];
				$video_ids[] = $this->request->get['source_id'];
				$videos = $this->getVideos($youtube, $video_ids);
				if (!empty($videos)) {
					$this->model_extension_module_ytchannel->updateVideo($videos);
				}
			}

			if (empty($data)) {
				$json['success'] = $language['text_yt_success'];
			} else {
				$json['error'] = $language['text_yt_error1'];
			}

		} else {
			$json['error'] = $language['text_yt_error2'];
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	protected function getVideos($youtube, $video_ids) {
		$videos = [];
		foreach ($video_ids as $item) {
			$video = $youtube->getVideoInfo($item);
			if (!empty($video->id)) {
				$videos[] = [
					'video_id' => $video->id,
					'channel_id' => $video->snippet->channelId,
					'title' => $video->snippet->title,
					'description' => $video->snippet->description,
					'thumb_default' => isset($video->snippet->thumbnails->default->url)?$video->snippet->thumbnails->default->url:'',
					'thumb_medium' => isset($video->snippet->thumbnails->medium->url)?$video->snippet->thumbnails->medium->url:'',
					'thumb_high' => isset($video->snippet->thumbnails->high->url)?$video->snippet->thumbnails->high->url:'',
					'thumb_standard' => !empty($video->snippet->thumbnails->standard) ? $video->snippet->thumbnails->standard->url : 'https://i.ytimg.com/vi/'.$video->id.'/sddefault.jpg',
					'thumb_maxres' => !empty($video->snippet->thumbnails->maxres) ? $video->snippet->thumbnails->maxres->url : 'https://i.ytimg.com/vi/'.$video->id.'/maxresdefault.jpg',
					'date_added' => $video->snippet->publishedAt,
					'views' => $video->statistics->viewCount,
					'likes' => $video->statistics->likeCount,
					'favorites' => $video->statistics->favoriteCount,
					'comments' => isset($video->statistics->commentCount) ? $video->statistics->commentCount : 0,
					'duration' => $video->contentDetails->duration
				];
			}
		}
		return $videos;
	}

	protected function convertDuration($duration) {
		$start = new DateTime('@0');
		$start->add(new DateInterval($duration));
		$youtube_time = $start->format('H:i:s');
		if (substr($youtube_time, 0, 3) == '00:') {
			$youtube_time = substr($youtube_time, 3, 5);
		}

		return $youtube_time;
	}

	protected function shortNumber($num) {
		if ($num>1000) {
			$language = $this->load->language('extension/module/ytchannel');
			$x = round($num);
			$x_number_format = number_format($x);
			$x_array = explode(',', $x_number_format);
			$x_parts = [$language['text_yt_thousand'], $language['text_yt_million'], $language['text_yt_billion'], $language['text_yt_trillion']];
			$x_count_parts = count($x_array) - 1;
			$x_display = $x;
			$x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
			$x_display .= $x_parts[$x_count_parts - 1];

			return $x_display;
		}

		return $num;
	}

}