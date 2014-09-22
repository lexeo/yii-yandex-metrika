<?php /* @var $this EYandexMetrikaWidget */?>
<?php
$informerParamsString = $this->informerSize .'_'. $this->informerArrowColor
    .'_'. $this->informerBackgroundColor .'_'. $this->informerBackgroundColorGradient
    .'_'. $this->informerTextColor .'_'. $this->informerDataType;
?>
<!-- Yandex.Metrika informer -->
<a href="https://metrika.yandex.ru/stat/?id=<?php echo $this->id; ?>&amp;from=informer" target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/<?php echo $this->id .'/'. $informerParamsString; ?>"
<?php $eAttr = $this::INFORMER_TYPE_ADVANCED == $this->informerType ? 'onclick="try{Ya.Metrika.informer({i:this,id:'. $this->id .',lang:\'ru\'});return false}catch(e){}"' : ''; ?>
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" <?php echo $eAttr; ?> /></a>
<!-- /Yandex.Metrika informer -->
