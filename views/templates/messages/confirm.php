<div class="confirm">
    <p><?php echo isset($message)?$message:'Êtes-vous sûr ?'; ?></p>
    <a href="<?php echo $okUrl; ?>"><?php echo isset($okMessage)?$okMessage:'Oui'; ?></a>
    <a href="<?php echo $noUrl; ?>"><?php echo isset($nokMessage)?$nokMessage:'Non'; ?></a>
</div>