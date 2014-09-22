<?php /* @var $this EYandexMetrikaWidget */?>
<!-- Yandex.Metrika counter -->
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript"></script>
<script type="text/javascript">
try {
	var yaCounter<?php echo $this->id; ?> = new Ya.Metrika(<?php echo CJavaScript::encode($this->getConfig()); ?>);
} catch(e) { }
</script>
<noscript><div><img src="//mc.yandex.ru/watch/<?php echo $this->id . ($this->noIndex ? '?ut=noindex': ''); ?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
