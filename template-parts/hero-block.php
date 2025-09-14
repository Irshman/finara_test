<?php 

$title = get_sub_field('title');
$description = get_sub_field('description');
$button1 = get_sub_field('button_1');
$button2 = get_sub_field('button_2');

$form_title = get_sub_field('form_title');
$form = get_sub_field('form');

?>

<section class="hero">
    <div class="container">
        <div class="hero__wrap">
            <div class="hero__content">
            <div class="hero__title">
                <?php echo $title; ?>
            </div>
            <div class="hero__description">
                <p><?php echo esc_html__($description, 'finara'); ?></p>
            </div>

            <div class="hero__buttons">
                <?php 
                if ($button1) {
                    $target1 = $button1['target'] ? $button1['target'] : '_self';
                ?>
                    <a class="hero__button" href="<?php echo esc_url($button1['url']); ?>" target="<?php echo esc_attr($target1); ?>">
                        <?php echo esc_html__($button1['title'], 'finara'); ?>
                    </a>
                <?php }; 

                if ($button2) {
                    $target2 = $button2['target'] ? $button2['target'] : '_self';
                ?>
                    <a class="hero__button" href="<?php echo esc_url($button2['url']); ?>" target="<?php echo esc_attr($target2); ?>">
                        <?php echo esc_html__($button2['title'], 'finara'); ?>
                    </a>
                <?php }; ?>
            </div>
        </div>

        <div class="hero__form">
            <div class="hero__form-title">
                <?php echo $form_title; ?>
            </div>

            <?php get_template_part('template-parts/form'); ?>
        </div>
        </div>
    </div>
</section>