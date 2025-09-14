<?php 
use Thm\Finara\ThemeFunctions;

$title = get_sub_field('title');
$description = get_sub_field('description');
$button1 = get_sub_field('button_1');
$button2 = get_sub_field('button_2');

$form_title = get_sub_field('form_title');
$form = get_sub_field('form');

// Must be video
$image_id = get_sub_field('video');

?>

<section class="how-works">
    <div class="container">
        <div class="how-works__advantages advantages">
            <?php if( have_rows('advantages') ) { ?>
                <ul class="advantages__list">
                    <?php while( have_rows('advantages') ) { the_row(); ?>
                        <li class="advantages__item"><?php echo ThemeFunctions::getInlineSvg('check'); ?><?php the_sub_field('advantage'); ?></li>
                    <?php }; ?>
                </ul>
            <?php }; ?>
        </div>

        <div class="how-works__content content">
            <div class="content__title">
                <?php echo $title; ?>
            </div>
            <div class="content__description">
                <p><?php echo esc_html__($description, 'finara'); ?></p>
            </div>
        </div>

        <div class="how-works__wrap">
            <div class="how-works__image">
                <?php 
                if( $image_id ) {
                    echo wp_get_attachment_image( $image_id, 'large', false, [
                        'class' => 'image',
                        'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true)
                    ] );
                }
                ?>
            </div>

            <div class="how-works__steps steps">
                <?php if( have_rows('steps') ) { ?>
                    <ul class="steps__list">
                        <?php while( have_rows('steps') ) { the_row(); ?>
                            <li class="steps__item">
                                <details>
                                    <summary><?php the_sub_field('step_title'); ?></summary>
                                    <p><?php the_sub_field('step_description'); ?></p>
                                </details>
                            </li>
                        <?php }; ?>
                    </ul>
                <?php }; ?>
            </div>
        </div>
    
    </div>
</section>