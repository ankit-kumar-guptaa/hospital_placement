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
    return hp_cdn($m['id'], $w);
}

function hp_cdn($id, $w) {
    return 'https://images.unsplash.com/' . $id
         . '?auto=format&fit=crop&w=' . (int) $w . '&q=72';
}

/**
 * Ordered fallback list for data-fallback: any alternate photos first, then
 * the local stand-in. theme.js walks it on error, so a single moved CDN file
 * never shows as a broken image.
 */
function hp_img_fallback($key, $w = 1000) {
    $m = hp_media($key);
    if (!$m) return hp_base() . 'assets/img/home1.jpg';
    $out = array();
    if (!HP_LOCAL_MEDIA && !empty($m['alts'])) {
        foreach ($m['alts'] as $id) { $out[] = hp_cdn($id, $w); }
    }
    $out[] = hp_base() . $m['local'];
    return implode(',', $out);
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
            'id'    => '',
            'local' => 'assets/img/about.png',
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

        /* --- hero: the full-bleed photograph behind the headline -------- */
        'hero_team' => array(
            'id'    => 'photo-1582750433449-648ed127bb54',
            'alts'  => array(
                'photo-1622253692010-333f2da6031d',
                'photo-1594824476967-48c8b964273f',
                'photo-1631217868264-e5b90bb7e133',
            ),
            'local' => 'assets/img/home1.jpg',
            'alt'   => 'Hospital doctor in a bright ward corridor with colleagues behind',
        ),
        'process_bg' => array(
            'id'    => 'photo-1516549655169-df83a0774514',
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Healthcare professionals in discussion',
        ),

        /* --- hero slider: the five role families we recruit for -------- */
        'hero_doctors' => array(
            'id'    => 'photo-1612349317150-e413f6a5b16d',
            'local' => 'assets/img/home1.jpg',
            'alt'   => 'Hospital consultants and resident doctors on a ward round',
        ),
        'hero_nurses' => array(
            'id'    => 'photo-1576091160399-112ba8d25d1d',
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Critical care nursing team at work in a hospital ICU',
        ),
        'hero_paramedical' => array(
            'id'    => 'photo-1579154204601-01588f351e67',
            'local' => 'assets/img/home1.jpg',
            'alt'   => 'Laboratory and diagnostics technician running hospital samples',
        ),
        'hero_theatre' => array(
            'id'    => 'photo-1551190822-a9333d879b1f',
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Operating theatre team preparing for a scheduled surgery',
        ),

        /* --- per-page heroes -------------------------------------------- */
        'contact_hero' => array(
            'id'    => 'photo-1587560699334-cc4ff634909a',
            'alts'  => array('photo-1551190822-a9333d879b1f'),
            'local' => 'assets/img/hero.png',
            'alt'   => 'Recruitment consultant on a call with a hospital',
        ),
        'jobs_hero' => array(
            'id'    => 'photo-1576091160399-112ba8d25d1d',
            'alts'  => array('photo-1594824476967-48c8b964273f'),
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Nurse reviewing notes on a hospital ward',
        ),
        'svc_doctor' => array(
            'id'    => 'photo-1622253692010-333f2da6031d',
            'alts'  => array('photo-1612349317150-e413f6a5b16d'),
            'local' => 'assets/img/home1.jpg',
            'alt'   => 'Hospital consultant doctor on a ward round',
        ),
        'svc_nurse' => array(
            'id'    => 'photo-1580281658626-ee379f3cce93',
            'alts'  => array('photo-1576091160399-112ba8d25d1d'),
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Critical care nurse at a hospital bedside',
        ),
        'svc_para' => array(
            'id'    => 'photo-1579154204601-01588f351e67',
            'alts'  => array('photo-1582719471384-894fbb16e074'),
            'local' => 'assets/img/home1.jpg',
            'alt'   => 'Laboratory technician running hospital diagnostics',
        ),
        'svc_specialty' => array(
            'id'    => 'photo-1551190822-a9333d879b1f',
            'alts'  => array('photo-1584982751601-97dcc096659c'),
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Surgical team in an operating theatre',
        ),
        'svc_permanent' => array(
            'id'    => 'photo-1584982751601-97dcc096659c',
            'alts'  => array('photo-1631217868264-e5b90bb7e133'),
            'local' => 'assets/img/home1.jpg',
            'alt'   => 'Hospital panel interviewing a shortlisted candidate',
        ),
        'svc_temp' => array(
            'id'    => 'photo-1519494026892-80bbd2d6fd0d',
            'alts'  => array('photo-1516549655169-df83a0774514'),
            'local' => 'assets/img/home2.jpg',
            'alt'   => 'Hospital corridor during a shift changeover',
        ),
        'svc_hospitals' => array(
            'id'    => 'photo-1516549655169-df83a0774514',
            'alts'  => array('photo-1519494026892-80bbd2d6fd0d'),
            'local' => 'assets/img/hero.png',
            'alt'   => 'Hospital department team at work',
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
