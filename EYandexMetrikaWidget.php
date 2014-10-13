<?php

/**
 * Simple Yii widget to add YandexMetrika counter/informer on web page
 * @link https://metrika.yandex.ru/
 *
 * @author Alexey "Lexeo" Grishatkin
 * @version 0.1.1 (2014-09-04)
 */
class EYandexMetrikaWidget extends CWidget
{
    const INFORMER_SIZE_LARGE = 3;
    const INFORMER_SIZE_MEDIUM = 2;
    const INFORMER_SIZE_SMALL = 1;

    const INFORMER_DATA_VISITS = 'visits';
    const INFORMER_DATA_PAGEVIEWS = 'pageviews';
    const INFORMER_DATA_UNIQUES = 'uniques';

    const INFORMER_TEXT_BLACK = 0;
    const INFORMER_TEXT_WHITE = 1;

    const INFORMER_ARROW_DARK = 0;
    const INFORMER_ARROW_LIGHT = 1;

    const INFORMER_TYPE_SIMPLE = 0;
    const INFORMER_TYPE_ADVANCED = 1;

    /**
     * @var integer
     */
    public $id;

    /**
     * @var boolean
     */
    public $webVisor = false;

    /**
     * @var boolean
     */
    public $clickMap = true;

    /**
     * @var boolean
     */
    public $trackLinks = true;

    /**
     * @var boolean
     */
    public $accurateTrackBounce = true;

    /**
     * @var boolean
     */
    public $trackHash = false;

    /**
     * @var boolean
     */
    public $noIndex = false;

    /**
     * @var boolean
     */
    public $async = true;

    /**
     * @var boolean
     */
    public $enabled = true;


   /**
    * @var boolean
    */
    public $informer = false;

    /**
     * @var integer
     */
    protected $informerType = self::INFORMER_TYPE_ADVANCED;

    /**
     * @var integer
     */
    protected $informerSize = self::INFORMER_SIZE_LARGE;

    /**
     * @var string
     */
    protected $informerDataType = self::INFORMER_DATA_PAGEVIEWS;

    /**
     * @var integer
     */
    protected $informerTextColor = self::INFORMER_TEXT_BLACK;

    /**
     * @var integer
     */
    protected $informerArrowColor = self::INFORMER_ARROW_LIGHT;

    /**
     * @var string
     */
    protected $informerBackgroundColor = 'FFFFFFFF';

    /**
     * @var string
     */
    protected  $informerBackgroundColorGradient = 'FFFFFFFF';


    /**
     * (non-PHPdoc)
     * @see CWidget::run()
     */
    public function run()
    {
        if ($this->enabled) {
            if (!is_numeric($this->id) || $this->id <= 0) {
                throw new RuntimeException('YandexMetrika ID is invalid. Please check the configuration options.');
            }
            $viewFilename = dirname(__FILE__) .'/views/'
                . (!$this->informer ? ($this->async ? 'async' : 'simple') : 'informer') .'.php';
            $this->renderFile($viewFilename);
        } else {
            $msg = 'EYandexMetrikaWidget is disabled. Rendering not performed.';
            Yii::log($msg, CLogger::LEVEL_INFO, 'application.widgets.EYandexMetrikaWidget');
        }
    }

    /**
     * @return array
     */
    protected function getConfig()
    {
        $config = array('id' => $this->id);
        $this->webVisor && $config['webvisor'] = true;
        $this->clickMap && $config['clickmap'] = true;
        $this->trackLinks && $config['trackLinks'] = true;
        $this->accurateTrackBounce && $config['accurateTrackBounce'] = true;
        $this->trackHash && $config['trackHash'] = true;
        $this->noIndex && $config['ut'] = 'noindex';
        return $config;
    }

    /**
     * @param integer $value
     * @throws InvalidArgumentException
     */
    public function setInformerType($value)
    {
        $allowed = array(self::INFORMER_TYPE_ADVANCED, self::INFORMER_TYPE_SIMPLE);
        if (!in_array($value, $allowed)) {
            throw new InvalidArgumentException('Unsupported "informerType" given. Please check the allowed values.');
        }
        $this->informerType = $value;
    }

    /**
     * @return integer
     */
    public function getInformerType()
    {
        return $this->informerType;
    }

    /**
     * @param integer $value
     * @throws InvalidArgumentException
     */
    public function setInformerSize($value)
    {
        $allowed = array(self::INFORMER_SIZE_LARGE, self::INFORMER_SIZE_MEDIUM, self::INFORMER_SIZE_SMALL);
        if (!in_array($value, $allowed)) {
            throw new InvalidArgumentException('Unsupported "informerSize" given. Please check the allowed values.');
        }
        $this->informerSize = $value;
    }

    /**
     * @return integer
     */
    public function getInformerSize()
    {
        return $this->informerSize;
    }

    /**
     * @param string $value
     * @throws InvalidArgumentException
     */
    public function setInformerDataType($value)
    {
        $allowed = array(self::INFORMER_DATA_PAGEVIEWS, self::INFORMER_DATA_UNIQUES, self::INFORMER_DATA_VISITS);
        if (!in_array($value, $allowed)) {
            throw new InvalidArgumentException('Unsupported "informerDataType" given. Please check the allowed values.');
        }
        $this->informerDataType = $value;
    }

    /**
     * @return string
     */
    public function getInformerDataType()
    {
        return $this->informerDataType;
    }

    /**
     * @param integer $value
     * @throws InvalidArgumentException
     */
    public function setInformerTextColor($value)
    {
        $allowed = array(self::INFORMER_TEXT_BLACK, self::INFORMER_TEXT_WHITE);
        if (!in_array($value, $allowed)) {
            throw new InvalidArgumentException('Unsupported "informerTextColor" given. Please check the allowed values.');
        }
        $this->informerTextColor = $value;
    }

    /**
     * @return integer
     */
    public function getInformerTextColor()
    {
        return $this->informerTextColor;
    }

    /**
     * @param integer $value
     * @throws InvalidArgumentException
     */
    public function setInformerArrowColor($value)
    {
        $allowed = array(self::INFORMER_ARROW_DARK, self::INFORMER_ARROW_LIGHT);
        if (!in_array($value, $allowed)) {
            throw new InvalidArgumentException('Unsupported "informerArrowColor" given. Please check the allowed values.');
        }
        $this->informerArrowColor = $value;
    }

    /**
     * @return integer
     */
    public function getInformerArrowColor()
    {
        return $this->informerArrowColor;
    }

    /**
     * @param string $value Hex color code
     * @throws InvalidArgumentException
     */
    public function setInformerBackgroundColor($value)
    {
        if (!preg_match('/#?[0-9a-f]{3,6}/i', $value)) {
            throw new InvalidArgumentException('Unsupported "informerBackgroundColor" given. Expected a valid Hex code.');
        }
        $value = str_pad(ltrim(strtoupper($value), '#'), 8, 'F');
        $this->informerBackgroundColor = $value;
    }

    /**
     * @return string
     */
    public function getInformerBackgroundColor()
    {
        return $this->informerBackgroundColor;
    }

    /**
     * @param string $value Hex color code
     * @throws InvalidArgumentException
     */
    public function setInformerBackgroundColorGradient($value)
    {
        if (!preg_match('/#?[0-9a-f]{3,6}/i', $value)) {
            throw new InvalidArgumentException('Unsupported "informerBackgroundColorGradient" given. Expected a valid Hex code.');
        }
        $value = str_pad(ltrim(strtoupper($value), '#'), 8, 'F');
        $this->informerBackgroundColorGradient = $value;
    }

    /**
     * @return string
     */
    public function getInformerBackgroundColorGradient()
    {
        return $this->informerBackgroundColorGradient;
    }

    /**
     * @param array $options
     */
    public function setInformerOptions(array $options)
    {
        foreach ($options as $k => $v) {
            $setter = 'setInformer'. ucfirst($k);
            $this->{$setter}($v);
        }
    }
}