yii-yandex-metrika
==================

Simple Yii widget to add YandexMetrika counter/informer on web page


##Requirements

Developed and tested with Yii 1.1.14. Should work on all 1.1.x versions.


##Usage

###Basic
~~~
[php]
/* @var $this CController */
$this->widget('ext.yii-yandex-metrika.EYandexMetrikaWidget', array(
   'id' => 123456789, // 
   'clickMap' => true,
   'trackLinks' => true,
   'accurateTrackBounce' => true,
));
~~~

or 
~~~
[php]
/* config/main.php */
'components' => array(
    'widgetFactory' => array(
    	'widgets' => array(
            'EYandexMetrikaWidget' => array(
                // you can disable it while working on local machine
    	        'enabled' => true, 
    	        'id' => 123456789,
    	        'clickMap' => true,
    	        'trackLinks' => true,
    	        'accurateTrackBounce' => true,
    	        
                'informerOptions' => array(
                    'backgroundColor' => '#427a4b', // hex color code
                    'textColor' => 1, // 0|1
                    'arrowColor' => 0, // 0|1
                    'dataType' => 'visits', // visits|pageviews|uniques
                    'type' => 1, // 0|1
                ),
            ),
        ),
    ),
),

/* view|layout file */

$this->widget('ext.yii-yandex-metrika.EYandexMetrikaWidget');
~~~


###Render Informer
~~~
[php]
/* @var $this CController */
$this->widget('ext.yii-yandex-metrika.EYandexMetrikaWidget', array(
    'id' => 123456789,
   'informer' => true,
   'informerSize' => 1, // 1|2|3
   'informerDataType' => 'uniques',
    'informerArrowColor' => 1, // 0|1 
   // or
   'informerOptions' => array(
        'textColor' => 0,
        'backgroundColor' => '#b7b7b7',
        'size' => 2,
   ),
));
~~~
or
~~~
[php]
/* config/main.php */
'components' => array(
    'widgetFactory' => array(
    	'widgets' => array(
            'EYandexMetrikaWidget' => array(
    	        'id' => 123456789,
    	        // ...
                'informerOptions' => array(
                    'backgroundColor' => '#427a4b', // hex color code
                    'textColor' => 1, // 0|1
                    'arrowColor' => 0, // 0|1
                    'dataType' => 'pageviews',
                ),
            ),
        ),
    ),
),

/* view|layout file */

$this->widget('ext.yii-yandex-metrika.EYandexMetrikaWidget', array('informer' => true));
~~~

