<?php

/**
 * Filter code to remove noopener rel from external links.
 */
add_filter('rank_math/noopener', '__return_false');
