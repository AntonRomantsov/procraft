<?php
class ModelToolImage extends Model {
public function webpSupport() {
        if ($this->config->get('module_webp_status')) {
            $webp = gd_info();
            
            if (isset($this->request->server['HTTP_ACCEPT']) && strpos($this->request->server['HTTP_ACCEPT'], 'webp')) {
                $status = true;
            } elseif (isset($this->request->server['HTTP_USER_AGENT']) && strpos($this->request->server['HTTP_USER_AGENT'], 'Firefox')) {
                $status = true;
            } else {
                $status = false;
            }

            if ($webp['WebP Support'] && $status) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
	public function resize($filename, $width, $height) {
		if (!is_file(DIR_IMAGE . $filename) || substr(str_replace('\\', '/', realpath(DIR_IMAGE . $filename)), 0, strlen(DIR_IMAGE)) != str_replace('\\', '/', DIR_IMAGE)) {
			return;
		}

		$extension = pathinfo($filename, PATHINFO_EXTENSION);

		$image_old = $filename;
		$image_new = 'cache/' . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . (int)$width . 'x' . (int)$height . '.' . $extension;

		if (!is_file(DIR_IMAGE . $image_new) || (filemtime(DIR_IMAGE . $image_old) > filemtime(DIR_IMAGE . $image_new))) {
			list($width_orig, $height_orig, $image_type) = getimagesize(DIR_IMAGE . $image_old);
				 
			if (!in_array($image_type, array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF))) { 
				return DIR_IMAGE . $image_old;
			}
						
			$path = '';

			$directories = explode('/', dirname($image_new));

			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;

				if (!is_dir(DIR_IMAGE . $path)) {
					@mkdir(DIR_IMAGE . $path, 0777);
				}
			}

			if ($width_orig != $width || $height_orig != $height) {
				$image = new Image(DIR_IMAGE . $image_old);
				$image->resize($width, $height);
				$image->save(DIR_IMAGE . $image_new);
			} else {
				copy(DIR_IMAGE . $image_old, DIR_IMAGE . $image_new);
			}
		}
		
$image_webp = false;
        $webp_support = $this->webpSupport();
        if(!isset($type)){$type='';}
        if ($webp_support && strtolower($extension) != 'gif') {
            error_reporting(0);
            ini_set('display_errors', 0);
            $image_webp = 'cache/webp/' . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . (int)$width . 'x' . (int)$height . $type . '.webp';
            if (!is_file(DIR_IMAGE . $image_webp) || (filemtime(DIR_IMAGE . $image_new) > filemtime(DIR_IMAGE . $image_webp))) {
                $path = '';
                $directories = explode('/', dirname($image_webp));
                foreach ($directories as $directory) {
                    $path = $path . '/' . $directory;
                    if (!is_dir(DIR_IMAGE . $path)) {
                        @mkdir(DIR_IMAGE . $path, 0777);
                    }
                }
                if (strtolower($extension) == 'jpg' || strtolower($extension) == 'jpeg') {
                    $image_default = imagecreatefromjpeg(DIR_IMAGE . $image_new);
                }
                elseif (strtolower($extension) == 'png') {
                    $image_default = imagecreatefrompng(DIR_IMAGE . $image_new);
                }
                imagewebp($image_default, DIR_IMAGE . $image_webp, ($this->config->get('module_webp_quality') ? $this->config->get('module_webp_quality') : 80));
                imagedestroy($image_default);
                if (filesize(DIR_IMAGE . $image_webp) % 2 == 1) {
                    file_put_contents(DIR_IMAGE . $image_webp, "\0", FILE_APPEND);
                }
            }
        }
        if ($webp_support && is_file(DIR_IMAGE . $image_webp)){
            $image_new = $image_webp;
        }
		$image_new = str_replace(' ', '%20', $image_new);  // fix bug when attach image on email (gmail.com). it is automatic changing space " " to +
		
		if ($this->request->server['HTTPS']) {
			return $this->config->get('config_ssl') . 'image/' . $image_new;
		} else {
			return $this->config->get('config_url') . 'image/' . $image_new;
		}
	}
}
