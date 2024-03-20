<?php

namespace HVP\Html5videoplayer\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\Validate;
use \HVP\Html5videoplayer\Div;
use \TYPO3\CMS\Core\Core\Environment;
use \TYPO3\CMS\Core\Resource\Exception\FileDoesNotExistException;
use \TYPO3\CMS\Core\Resource\FileInterface;
use \TYPO3\CMS\Core\Resource\ResourceFactory;
use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Utility\MathUtility;
use \TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use \TYPO3\CMS\Frontend\Resource\FilePathSanitizer;

class Video extends AbstractEntity
{

    /**
     * The title of the Video
     *
     * @var string
     * @Validate("StringLength", options={"minimum" = 1})
     */
    protected $title;

    /**
     * Vimeo Source Url
     *
     * @var string
     */
    protected $vimeo;

    /**
     * The description
     *
     * @var string
     */
    protected $description;

    /**
     * The posterimage of the Video
     *
     * @var string
     */
    protected $posterimage;

    /**
     * The mp4source of the Video
     *
     * @var string
     */
    protected $mp4source;

    /**
     * @var string
     */
    protected $subtitle;

    /**
     * The webmsource of the Video
     *
     * @var string
     */
    protected $webmsource;

    /**
     * The oggsource of the Video
     *
     * @var string
     */
    protected $oggsource;

    /**
     * The height of the Video
     *
     * @var string
     */
    protected $height;

    /**
     * The width of the Video
     *
     * @var string
     */
    protected $width;

    /**
     * Show download links
     *
     * @var boolean
     */
    protected $downloadlinks;

    /**
     * Show the support link
     *
     * @var boolean
     */
    protected $supportvideojs;

    /**
     * Preload the video
     *
     * @var string
     */
    protected $preloadvideo;

    /**
     * Autoplay the video
     *
     * @var boolean
     */
    protected $autoplayvideo;

    /**
     * Mute the video
     *
     * @var boolean
     */
    protected $mutevideo;

    /**
     * Loop the video
     *
     * @var boolean
     */
    protected $loopvideo;

    /**
     * Start time of the video (in s)
     *
     * @var integer
     */
    protected $videoStarttime;

    /**
     * @var boolean
     */
    protected $controlsvideo;

    /**
     * @var string
     */
    protected $youtube;

    /**
     * Returns the $title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title of the Video
     *
     * @param string $title the $title to set
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the $posterimage
     *
     * @return string
     */
    public function getPosterimage()
    {
        return $this->retrieveMediaUrl($this->posterimage);
    }

    /**
     * Set the posterimage of the Video
     *
     * @param string $posterimage the $posterimage to set
     */
    public function setPosterimage($posterimage)
    {
        $this->posterimage = $posterimage;
    }

    /**
     * Returns the $mp4source
     *
     * @return string
     */
    public function getMp4source()
    {
        return $this->retrieveMediaUrl($this->mp4source);
    }

    /**
     * Set the mp4source of the Video
     *
     * @param string $mp4source the $mp4source to set
     */
    public function setMp4source($mp4source)
    {
        $this->mp4source = $mp4source;
    }

    public function getSubtitle()
    {
        return $this->subtitle;
    }

    public function setSubtitle($s)
    {
        $this->subtitle = $s;
    }

    /**
     * Returns the $webmsource
     *
     * @return string
     */
    public function getWebmsource()
    {
        return $this->retrieveMediaUrl($this->webmsource);
    }

    /**
     * Set the webmsource of the Video
     *
     * @param string $webmsource the $webmsource to set
     */
    public function setWebmsource($webmsource)
    {
        $this->webmsource = $webmsource;
    }

    /**
     * Returns the $oggsource
     *
     * @return string
     */
    public function getOggsource()
    {
        return $this->retrieveMediaUrl($this->oggsource);
    }

    /**
     * Set the oggsource of the Video
     *
     * @param string $oggsource the $oggsource to set
     */
    public function setOggsource($oggsource)
    {
        $this->oggsource = $oggsource;
    }

    /**
     * Returns the $height
     *
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the height of the Video
     *
     * @param string $height the $height to set
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * Returns the $width
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the width of the Video
     *
     * @param string $width the $width to set
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * Returns the $downloadlinks
     *
     * @return string
     */
    public function getDownloadlinks()
    {
        return $this->downloadlinks;
    }

    /**
     * Set the downloadlinks of the Video
     *
     * @param boolean $downloadlinks the $downloadlinks to set
     */
    public function setDownloadlinks($downloadlinks)
    {
        $this->downloadlinks = $downloadlinks;
    }

    /**
     * Returns the $supportvideojs
     *
     * @return string
     */
    public function getSupportvideojs()
    {
        return $this->supportvideojs;
    }

    /**
     * Set the supportvideojs of the Video
     *
     * @param boolean $supportvideojs the $supportvideojs to set
     */
    public function setSupportvideojs($supportvideojs)
    {
        $this->supportvideojs = $supportvideojs;
    }

    /**
     * Returns the $preloadvideo
     *
     * @return string
     */
    public function getPreloadvideo()
    {
        return $this->preloadvideo;
    }

    /**
     * Set the preloadvideo of the Video
     *
     * @param string $preloadvideo the $preloadvideo to set
     */
    public function setPreloadvideo($preloadvideo)
    {
        $this->preloadvideo = $preloadvideo;
    }

    /**
     * Returns the $autoplayvideo
     *
     * @return string
     */
    public function getAutoplayvideo()
    {
        return $this->autoplayvideo;
    }

    /**
     * Set the autoplayvideo of the Video
     *
     * @param boolean $autoplayvideo the $autoplayvideo to set
     */
    public function setAutoplayvideo($autoplayvideo)
    {
        $this->autoplayvideo = $autoplayvideo;
    }

    /**
     * @return int
     */
    public function getVideoStarttime()
    {
        return $this->videoStarttime;
    }

    /**
     * @param int $videoStarttime
     */
    public function setVideoStarttime($videoStarttime)
    {
        $this->videoStarttime = $videoStarttime;
    }

    /**
     * @return boolean
     */
    public function getControlsvideo()
    {
        return (boolean)$this->controlsvideo;
    }

    /**
     * @param boolean $controlsvideo
     */
    public function setControlsvideo($controlsvideo)
    {
        $this->controlsvideo = $controlsvideo;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param boolean $loopvideo
     */
    public function setLoopvideo($loopvideo)
    {
        $this->loopvideo = $loopvideo;
    }

    /**
     * @return boolean
     */
    public function getLoopvideo()
    {
        return (boolean)$this->loopvideo;
    }

    /**
     * Set the mute of the Video
     *
     * @param boolean $mutevideo
     */
    public function setMutevideo($mutevideo)
    {
        $this->mutevideo = $mutevideo;
    }

    /**
     * Returns the $mutevideo
     *
     * @return boolean
     */
    public function getMutevideo()
    {
        return (boolean)$this->mutevideo;
    }

    /**
     * Resolves the URL of an file
     *
     * @param $media
     * @return null|string
     * @throws FileDoesNotExistException
     */
    protected function retrieveMediaUrl($media)
    {
        if (trim($media) === '') {
            return '';
        }

        // Quick-fix for the Vimeo api (add "?api=1" to the media address)
        if (strpos($media, 'vimeo.com') !== false) {
            $media .= '?api=1';
        }

        $media = urldecode($media);

        // Get the path relative to the page currently outputted
        if (strpos($media, "file:") === 0) {
            $fileUid = substr($media, 5);

            if (MathUtility::canBeInterpretedAsInteger($fileUid)) {
                $fileObject = GeneralUtility::makeInstance(ResourceFactory::class)
                    ->getFileObject($fileUid);

                if ($fileObject instanceof FileInterface) {
                    return $fileObject->getPublicUrl();
                }
            }
        }

        if (strpos($media, 't3://') !== false) {
            /** @var ContentObjectRenderer $contentObject */
            $contentObject = GeneralUtility::makeInstance(ContentObjectRenderer::class);
            $contentObject->start([], '');
            $media = ltrim($contentObject->stdWrap(
                '',
                [
                    'typolink.' => [
                        'parameter' => $media,
                        'returnLast' => 'url'
                    ]
                ]
            ));
        }

        if (is_file(Environment::getPublicPath() . '/' . rawurldecode($media))) {
            $filePathSanitizer = GeneralUtility::makeInstance(FilePathSanitizer::class);
            return $filePathSanitizer->sanitize(rawurldecode($media));
        }

        if (GeneralUtility::isValidUrl($media)) {
            // prevent "data:" and "javascript:" Resources! Whitelist!
            if (!in_array(parse_url($media, PHP_URL_SCHEME), ['http', 'https'])) {
                return '';
            }
            return $media;
        }

        // Relative paths, likely coming from the `GeneratePublicUrlForResource` EventListener
        if (str_starts_with($media, '/')) {
            return $media;
        }

        throw new \RuntimeException('Could not fetch the URL in the right way', 12_367_238_462_384);
    }

    /**
     * @param string $youtube
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;
    }

    /**
     * @return string
     */
    public function getYoutube()
    {
        return $this->retrieveMediaUrl($this->youtube);
    }

    /**
     * @param string $vimeo
     */
    public function setVimeo($vimeo)
    {
        $this->vimeo = $vimeo;
    }

    /**
     * @return string
     */
    public function getVimeo()
    {
        return $this->retrieveMediaUrl($this->vimeo);
    }

    /**
     * @return int|string
     */
    public function getMinWidth()
    {
        $width = $this->getWidth();
        if (trim($width) !== '' &&
            (
                ((int)$width !== 0) || trim($width) === 'auto'
            )
        ) {
            return $width;
        }

        $default = Div::getConfigurationValue('generalMinWith');
        return (int)$default ?: 200;
    }

    /**
     * @return int|string
     */
    public function getMinHeight()
    {
        $height = $this->getHeight();
        if (trim($height) !== '' &&
            (
                ((int)$height !== 0) || trim($height) === 'auto'
            )
        ) {
            return $height;
        }

        $default = Div::getConfigurationValue('generalMinHeight');
        return (int)$default ?: 150;
    }

    /**
     * @return string
     */
    public function getTechOrder()
    {
        $return = '';
        if ($this->getYoutube() !== '') {
            $return .= '"youtube",';
        }
        if ($this->getVimeo() !== '') {
            $return .= '"vimeo",';
        }
        return $return . '"html5"';
    }
}
