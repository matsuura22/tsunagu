<?php

namespace App\Utils;
use Cake\Routing\Router;

class ImgGousei
{
	public static function _mb_str_split($str, $length) {
    
		if ($length <1) return FALSE;
		
		$result = array();
		
		for ($i = 0; $i <mb_strlen($str); $i += $length) {    
		$result[] = mb_substr($str, $i, $length);
		}
		return $result;
	}

    public static function image_gousei($imageUrl,$createDate,$contents,$pdfExportUrl)
    {
		$pdf_back = '../webroot/img/pdf_img/base/pdf_back.png';
		$pdf_logo = '../webroot/img/pdf_img/base/cfi_logo.png';
		$pdf_Export = '../webroot/img/pdf_img/create/'.$pdfExportUrl;
        $pdf_gousei = $imageUrl;

        $image_back = imagecreatefrompng($pdf_back);
		$image_beta = imagecreatefrompng($pdf_logo);

		if($type = exif_imagetype($pdf_gousei)){
			switch($type){
				//jpgの場合
				case IMAGETYPE_JPEG:
					$image_alpha = imagecreatefromjpeg($pdf_gousei);
					break;
				//pngの場合
				case IMAGETYPE_PNG:
					$image_alpha = imagecreatefrompng($pdf_gousei);
					break;
				//どれにも該当しない場合
				default:
					return false;
			}
		}

        list($width, $height, $type, $attr) = getimagesize($pdf_back);

        $x = 115;
        $y = 380;

        imagecopymerge($image_back, //コピー先の画像リンクリソース
            $image_alpha, //コピー元の画像リンクリソース
            $x, //コピー先の x 座標
            $y, //コピー先の y 座標
            0, //コピー元の x 座標
            0, //コピー元の y 座標
            1000, //コピー元の幅
            550, //コピー元の高さ
            100//透過度（%）
		);

		imagedestroy($image_alpha);

        $x = 70;
        $y = 20;
		
		 imagecopymerge(
            $image_back, //コピー先の画像リンクリソース
            $image_beta, //コピー元の画像リンクリソース
            $x, //コピー先の x 座標
            $y, //コピー先の y 座標
            0, //コピー元の x 座標
            0, //コピー元の y 座標
            150, //コピー元の幅
            150, //コピー元の高さ
            100//透過度（%）
        );

		imagedestroy($image_beta);

		$text_color1 = imagecolorallocate($image_back, 255, 143, 155);
		$font = '../webroot/img/pdf_img/base/meiryo.ttc';
	
		$year = date_format($createDate,'Y');
		$month = date_format($createDate,'m');
		$day = date_format($createDate,'d');
	
		switch(date_format($createDate,'w'))
		{
			case 0:
				$week = '日';
				break;
			case 1:
				$week = '月';
				break;
			case 2:
				$week = '火';
				break;
			case 3:
				$week = '水';
				break;
			case 4:
				$week = '木';
				break;
			case 5:
				$week = '金';
				break;
			case 6:
				$week = '土';
				break;
		}
	
		$contents_arr = self::_mb_str_split($contents, 8);

		imageTtfText($image_back, 44, 0, 280, 110,$text_color1,$font,$year.'年'); 
	
		if(mb_strlen($month) > 1)
		{
			imageTtfText($image_back, 44, 0, 90, 266,$text_color1,$font,$month);    
		}
		else
		{
			imageTtfText($image_back, 44, 0, 90, 266,$text_color1,$font,$month);
		}
	
		if(mb_strlen($day) > 1)
		{
			imageTtfText($image_back, 44, 0, 225, 266,$text_color1,$font,$day);    
		}
		else
		{
			imageTtfText($image_back, 44, 0, 225, 266,$text_color1,$font,$day);
		}
	
		if(mb_strlen($week) > 1)
		{
			imageTtfText($image_back, 44, 0, 380, 266,$text_color1,$font,$week);    
		}
		else
		{
			imageTtfText($image_back, 44, 0, 380, 266,$text_color1,$font,$week);
		}
	
		$X_index = 1075;
	
		foreach($contents_arr as $content)
		{
			$l = mb_strlen($content,'UTF-8');
			$chunked = array();
			for ($i=0; $i<$l; $i++) {$chunked[] = mb_substr($content,$i,1,'UTF-8');}

			$verticalString = join("\n",$chunked);
			imageTTFText($image_back,38, 0, $X_index,1060,$text_color1,$font,$verticalString);
	
			$X_index -= 120;
		}
		Imagepng($image_back, $pdf_Export);//出力
		imagedestroy($image_back);

        return true;
    }
}
