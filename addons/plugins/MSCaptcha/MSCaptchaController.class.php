<?php
/**
 * MSCaptcha by DaVchezt
 **/
if (!defined("IN_ESOTALK")) exit;

Class MSCaptchaController extends ETController {
	protected $width = 110;
	protected $height = 45;
	protected $font = '/font/League_Gothic.ttf';
	protected $font_size = 20;
	protected $font_colors = array(0, 50, 100, 150, 200);
	
	public function action_index()
	{
		// ttf font
		$this->font = dirname(__FILE__) . $this->font;
		// Create the image
		$src = imagecreatetruecolor($this->width, $this->height);
		// Create white color
		$white = imagecolorallocate($src, 255, 255, 255);
		imagefill($src, 0, 0, $white);
		
		// Genrate random number
		$a = rand(1, 20);
		$b = rand(1, 20);
		
		// Get the code		
		$c = $a + $b;
		// Genrate session of code
		ET::$session->store('mscaptcha', $c);
		
		$arr = array($a, '+', $b, '=', '?');
		// Create Image from code
		for($i = 0; $i < count($arr); $i++) {
			$color = imagecolorallocatealpha(
				$src,
				$this->font_colors[rand(0, count($this->font_colors) - 1)],
				$this->font_colors[rand(0, count($this->font_colors) - 1)],
				$this->font_colors[rand(0, count($this->font_colors) - 1)],
				rand(0, 50)
			);
			imagettftext(
				$src,
				$this->font_size,
				0,
				($this->font_size * ($i + 1)) - 10,
				(($this->height * 2) / 3) + 3,
				$color,
				$this->font,
				$arr[$i]
			);
		}
		header("Content-type: image/png");
		imagepng($src);
		imagedestroy($src);
	}
	
}