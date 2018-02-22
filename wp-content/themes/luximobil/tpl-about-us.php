<?php
/*
 *Template Name: About Us
*/
get_header();
$groupPhoto = get_field('image_all_group');
$teamMemberHeading = get_field('members_heading_section');
?>
<div class="main-content-about-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img class="group-photo"
                     src="<?php echo $groupPhoto['url']; ?>"
                     alt="<?php echo $groupPhoto['alt']; ?>">
            </div>
            <div class="col-sm-7">
                <h1 class="about-us-heading"><?php the_title(); ?></h1>
                <div class="company-description">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="team-members-section">
    <div class="container">
        <h1 class="title-team-section">
            <?php echo $teamMemberHeading; ?>
        </h1>

        <div class="owl-carousel team-members-carousel">
            <?php if (have_rows('team_members_carousel')):
                while (have_rows('team_members_carousel')) : the_row(); ?>
                    <div class="team-member-container">
                        <?php
                            $memberImage = get_sub_field('member_photo');
                            $memberName = get_sub_field('member_name');
                            $memberJob = get_sub_field('member_job');
                        ?>
                        <img src="<?php echo $memberImage['sizes']['team-photo']; ?>"
                             alt="<?php echo $memberImage['alt']; ?>">
                        <h3 class="member-name">
                            <?php echo $memberName; ?>
                        </h3>
                        <p class="member-job">
                            <?php echo $memberJob; ?>
                        </p>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
