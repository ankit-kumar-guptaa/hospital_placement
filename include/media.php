<?php
/**
 * media.php - one place for every photograph on the marketing pages.
 *
 * Photos are served from the Unsplash CDN (free licence, no attribution
 * required) with width and quality baked into the query string, and every
 * entry names a LOCAL fallback that theme.js swaps in if the remote file
 * ever fails to load. No visitor sees a broken image.
 *
 * TO SELF-HOST (recommended for best LCP and image SEO):
 *   1. run  bash scripts/fetch-images.sh   from the project root
 *   2. set  HP_LOCAL_MEDIA  below to true
 * Nothing else needs to change.
 */

define('HP_LOCAL_MEDIA', false);

/** Absolute-from-root prefix so these work from / and from /blog/ alike. */
function hp_base() { return '/'; }

/**
 * @param string $key   entry in the map below
 * @param int    $w     requested width in px
 * @return string       the URL to put in src
 */
function hp_img($key, $w = 1000) {
    $m = hp_media($key);
    if (!$m) return hp_base() . 'assets/img/home1.jpg';
    if (HP_LOCAL_MEDIA || empty($m['id'])) return hp_base() . $m['local'];
    return 'https://images.unsplash.com/' . $m['id']
         . '?auto=format&fit=crop&w=' . (int) $w . '&q=72';
}

/** Local stand-in, emitted as data-fallback on every remote <img>. */
function hp_img_fallback($key) {
    $m = hp_media($key);
    return hp_base() . ($m ? $m['local'] : 'assets/img/home1.jpg');
}

/** SEO alt text. Descriptive, never keyword-stuffed, never empty. */
function hp_img_alt($key) {
    $m = hp_media($key);
    return $m ? $m['alt'] : 'HospitalPlacement.com healthcare recruitment';
}

function hp_media($key) {
    static $map = null;
    if ($map === null) $map = array(

        /* --- home page ------------------------------------------------- */
        'about_main' => array(
            'id'    => 'photo-1622253692010-333f2da6031d',
            'local' => 'assets/img/home1.jpg',
            'alt'   => 'Hospital consultant doctor reviewing a patient chart on a ward round',
        ),
        'about_inset' => array(
            'id'    => 'photo-1631217868264-e5b90bb7e133',
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Nursing team in discussion at a hospital nurses station',
        ),
        'solutions_media' => array(
            'id'    => 'photo-1584982751601-97dcc096659c',
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Hospital recruitment panel interviewing a shortlisted medical candidate',
        ),

        /* --- locations: India cities already ship with the project ----- */
        'city_delhi'      => array('id' => '', 'local' => 'assets/img/delhi-ncr.jpg',   'alt' => 'Hospital recruitment agency serving Delhi NCR hospitals'),
        'city_mumbai'     => array('id' => '', 'local' => 'assets/img/mumbai.jpg',      'alt' => 'Medical staffing consultants for Mumbai hospitals and clinics'),
        'city_hyderabad'  => array('id' => '', 'local' => 'assets/img/hyderabad.jpeg',  'alt' => 'Healthcare placement agency for Hyderabad hospitals'),
        'city_chandigarh' => array('id' => '', 'local' => 'assets/img/chandigarh.jpg',  'alt' => 'Hospital job consultants covering Chandigarh and Tricity'),
        'city_kolkata'    => array('id' => '', 'local' => 'assets/img/kolkata.jpg',     'alt' => 'Nursing and doctor recruitment services in Kolkata'),
        'city_lucknow'    => array('id' => '', 'local' => 'assets/img/lucknow.jpg',     'alt' => 'Healthcare recruitment consultants in Lucknow'),
        'city_consultants' => array(
            'id'    => 'photo-1666214280557-f1b5022eb634',
            'local' => 'assets/img/home1.jpg',
            'alt'   => 'Hospital job consultant briefing a doctor on a Delhi NCR vacancy',
        ),
        'city_uae'        => array(
            'id'    => 'photo-1512453979798-5ea266f8880c',
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Dubai skyline, base for our UAE healthcare recruitment desk',
        ),
    );
    return isset($map[$key]) ? $map[$key] : null;
}
