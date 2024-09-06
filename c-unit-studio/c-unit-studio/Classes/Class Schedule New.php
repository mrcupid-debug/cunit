<?php
// Template Name: Class Schedule New
get_header();

?>
<!-- Page Title -->
<section class="Class_Schedule page_background_title" style="background-image: url('<?php echo esc_url(get_field('header_section_image', 'options')); ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page_title text-white">
                    <?php echo get_field('page_title'); ?>
                </div>
                <div class="regular text-center text-white">
                    <?php echo get_field('page_sub_title'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="section_image_top">
    <img src="<?php echo esc_url(get_field('section_image', 'options')); ?>" alt="">
</div>

<?php
$days_group = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'satuday');
$studios = array('studio_a', 'studio_b', 'studio_c', 'studio_d', 'studio_e');


// print '<pre>'; print_r($monday_group); print '</pre>';
?>
<div class="container">
    <div class="weekly-schedule-top-section">
        <div class="download-btn">
            <a href="#" class="download_pdf register_btn">Download PDF</a>
        </div>
    </div>
    <div id="weeklyschedule" class="weekly-schedule">
        <?php
        foreach ($days_group as $day) : $day_groups = get_field($day . '_group', 'option'); ?>

            <?php if( $day_groups ) : ?>
            <div class="day-group">
                <div class="day-heading"><?= $day ?></div>
                <div class="studio-lists">
                    <?php
                    foreach ($day_groups as $key => $studio_schedules) :

                        if (isset($studio_schedules['add_a_schedule']) && $studio_schedules['add_a_schedule']): ?>
                            <div class="studio-schedules">

                                <?php
                                foreach ($studios as $studio) : ?>
                                    <?php if (str_contains($key, $studio)) : ?>
                                        <div class="studio-type">
                                            <span><?= str_replace("_", " ", $studio) ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php
                                endforeach;

                                foreach ($studio_schedules['add_a_schedule'] as $schedule) :

                                    $title = $schedule['title'];
                                    $time_slot = $schedule['time_slot']; ?>

                                    <div class="time-slot">
                                        <div class="description"> <?= $title ?></div>
                                        <div class="time"> <?= $time_slot ?></div>
                                    </div>

                                <?php
                                endforeach;
                                ?>

                            </div>
                    <?php
                        endif;

                    endforeach; ?>
                </div>
            </div>

            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<style>
    .day-group {
        display: grid;
        grid-template-columns: 0.2fr 1fr;
        align-items: center;
        border-top: 15px solid #000;
        border-bottom: 7.5px solid #000;
        border-left: 15px solid #000;
        border-right: 15px solid #000;
        min-height: 275px;
    }

    .day-heading {
        font-weight: 700;
        text-transform: uppercase;
        font-size: 24px;
        color: #fff;
        background: #525659;
        height: 100%;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #000;
        border-right: 1.2em solid #000;
    }

    .studio-lists {
        display: flex;
        flex-direction: column;
        border: 2px solid #000;
    }

    .studio-schedules {
        display: grid;
        grid-template-columns: 165px repeat(auto-fill, minmax(165px, 177px));
        grid-template-rows: auto;
        justify-items: stretch;
        align-items: stretch;
    }

    .studio-schedules>div {
        padding: 15px;
        margin: 2px;
        align-content: center;
        /* border-color: #000; */
        /* border-top: 1px solid;
        border-bottom: 1px solid;
        border-left: 2px solid;
        border-right: 2px solid; */
    }

    .studio-schedules .description {
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        text-wrap: pretty;
    }

    .studio-schedules .time {
        font-weight: 500;
        text-wrap: balance;
        text-align: center;
        font-size: 15px;
    }

    .day-heading,
    .studio-schedules .description,
    .studio-schedules .studio-type {
        font-family: Oswald;
        text-align: center;
    }

    .studio-type {
        font-size: 18px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: #525659;
        text-transform: uppercase;
    }

    .studio-lists>.studio-schedules:nth-child(1)>.studio-type {
        background: #0000ff;
    }

    .studio-lists>.studio-schedules:nth-child(1)>.time-slot {
        background: #cfe2f3
    }

    .studio-lists>.studio-schedules:nth-child(2)>.studio-type {
        background: #38761d;
    }

    .studio-lists>.studio-schedules:nth-child(2)>.time-slot {
        background: #d9ead3;
    }

    .studio-lists>.studio-schedules:nth-child(3)>.studio-type {
        background: #d1a935;
    }

    .studio-lists>.studio-schedules:nth-child(3)>.time-slot {
        background: #fff2cc;
    }

    .studio-lists>.studio-schedules:nth-child(4)>.studio-type {
        background: #a64d79;
    }

    .studio-lists>.studio-schedules:nth-child(4)>.time-slot {
        background: #ead1dc;
    }

    .studio-lists>.studio-schedules:nth-child(5)>.studio-type {
        background: #674ea7;
    }

    .studio-lists>.studio-schedules:nth-child(5)>.time-slot {
        background: #d9d2e9;
    }

    .weekly-schedule-top-section {
        margin: 30px 0;
        display: flex;
        justify-content: flex-end;
    }
    .container{
        max-width: 1440px;
    }
    @media all and (max-width: 767px) {
        .weekly-schedule {
            display: flex;
            flex-direction: column;
        }

        .studio-lists {
            flex-direction: column;
        }

        .day-group,
        .studio-schedules {
            grid-template-columns: auto;
        }

        .day-heading {
            border-right: 2px solid #000;
        }
    }
</style>

<!-- Content Ends -->
<?php if (have_rows('flexible-content', 'options')) : ?>
    <?php while (have_rows('flexible-content', 'options')) : the_row(); ?>

        <?php if (get_row_layout() == 'services'): ?>

            <?php get_template_part('section/services'); ?>

        <?php endif; ?>

        <?php if (get_row_layout() == 'call_to_action'): ?>

            <?php get_template_part('section/cta'); ?>

        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>