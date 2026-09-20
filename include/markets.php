<?php
/**
 * markets.php - the four markets we recruit into, and everything that is
 * true about each one.
 *
 * The topbar names four countries, so four countries need a page. This file
 * is the single place that says what each of those pages contains, the same
 * way include/pages.php is the single place that says which pages exist.
 * The topbar, the header menu, the home page market band and the four
 * landing pages all read from here, so a market cannot say one thing in the
 * nav and another on its own page.
 *
 * What makes each market different is not the marketing, it is the route in:
 * who registers a clinician, which exam stands in the way, how long it takes
 * and which of our two offices runs it. That is what the keys below carry.
 *
 * Keys
 *   name      how the market is written in the nav and on the page
 *   the       'the ' where the name needs an article in a sentence
 *   icon      Font Awesome class for the nav menu
 *   area      schema.org areaServed for this market's Service node
 *   file      the landing page in include/pages.php
 *   blurb     one line, used on nav cards; no full stop needed
 *   opening   the paragraph under the market's own H1
 *   facts     label => value, the market brief panel. Ordered.
 *   route     the licensing pathway, in order. Each: icon, title, detail
 *   roles     what hospitals in this market actually brief us for
 *   cover     sub-markets. 'cities' links out, 'list' is plain text
 *   note      the honest caveat under the coverage block, or ''
 */
if (!function_exists('hp_url')) require_once __DIR__ . '/pages.php';

if (!function_exists('hp_markets')) {

function hp_markets() {
    static $m = null;
    if ($m !== null) return $m;

    $m = array(

    /* ---------------------------------------------------------------- india */
    'india' => array(
      'name'  => 'India',
      'the'   => '',
      'icon'  => 'fa-earth-asia',
      'area'  => array(array('@type' => 'Country', 'name' => 'India')),
      'file'  => 'hospital-recruitment-agency-in-india.php',
      'blurb' => 'Six city desks, no visa step, fastest joining dates',
      'opening' => 'India is our home market and the one we move fastest in. There is no
                    licensing queue and no visa to wait on, so the limit on a joining date is
                    the notice period, not the paperwork. We run it from New Delhi with named
                    desks on six cities, each holding its own pay bands and its own candidates.',
      'facts' => array(
        'Who registers a clinician' => 'National Medical Commission and the state medical councils for doctors, the Indian Nursing Council and state nursing councils for nurses',
        'What stands in the way'     => 'State council registration and document verification. No licensing exam, no visa',
        'Typical time to joining'    => 'Two to six weeks, set by the notice period rather than by us',
        'Our desk'                   => 'New Delhi, A-83 Okhla Phase II',
      ),
      'route' => array(
        array('fa-file-lines',     'Brief and benchmark',   'You give us the role and the city. We come back with the band that city is actually paying for it before the search starts.'),
        array('fa-id-card',        'Registration checked',  'State medical or nursing council registration and the qualification documents are verified before a CV reaches your panel.'),
        array('fa-comments',       'Panel interviews',      'We schedule around your consultants, not around ours, and brief the candidate on your unit before they walk in.'),
        array('fa-handshake',      'Offer and joining',     'We hold the candidate through the notice period, which is where most Indian offers are lost, and confirm the joining date.'),
      ),
      'roles' => array(
        array('fa-user-doctor', 'Consultants and residents', 'Cardiology, orthopaedics, general and laparoscopic surgery, gynaecology, paediatrics, anaesthesia, radiology'),
        array('fa-user-nurse',  'ICU, theatre and ward nursing', 'Staff nurse through to nurse manager, including new unit commissioning'),
        array('fa-microscope',  'Paramedical and diagnostics', 'Laboratory, radiography, dialysis, cath lab and theatre technicians'),
        array('fa-hospital-user','Hospital administration',  'Operations, quality and accreditation, front office, HR'),
      ),
      'cover' => 'cities',
      'note'  => '',
    ),

    /* ------------------------------------------------------------------ uae */
    'uae' => array(
      'name'  => 'UAE',
      'the'   => 'the ',
      'icon'  => 'fa-earth-africa',
      'area'  => array(array('@type' => 'Country', 'name' => 'United Arab Emirates')),
      'file'  => 'healthcare-recruitment-agency-in-uae.php',
      'blurb' => 'Licensing handled from our own Ajman office',
      'opening' => 'The Gulf does not turn on finding the candidate, it turns on getting them
                    licensed. Every emirate licenses separately, every file goes through primary
                    source verification, and most clinical roles sit behind an exam. We have an
                    office in Ajman that does nothing else, so the file is run locally rather
                    than posted at the problem from another country.',
      'facts' => array(
        'Who licenses a clinician' => 'DHA in Dubai, DOH in Abu Dhabi, MOHAP for Ajman, Sharjah, Fujairah, Umm Al Quwain and Ras Al Khaimah',
        'What stands in the way'   => 'DataFlow primary source verification, then a Prometric computer-based exam for most clinical grades',
        'Typical time to joining'  => 'Eight to sixteen weeks, most of it verification and visa rather than search',
        'Our desk'                 => 'Ajman, 26th Floor, Amber Gem Tower',
      ),
      'route' => array(
        array('fa-folder-open',   'Documents assembled',  'Degree, transcript, registration and experience letters, checked against the authority the candidate is applying to before anything is submitted.'),
        array('fa-magnifying-glass','DataFlow verification','Primary source verification goes back to the issuing university and the employer directly. It is the step that fails files, so we pre-check it.'),
        array('fa-pen-to-square', 'Prometric exam',       'The candidate sits the authority exam for their grade. We tell them which one, and what it actually asks, before they book it.'),
        array('fa-passport',      'Eligibility and visa', 'Eligibility letter, offer, employment visa, medical and Emirates ID, tracked by our Ajman desk through to the joining date.'),
      ),
      'roles' => array(
        array('fa-user-nurse',  'Registered nurses',      'ICU, theatre, emergency, dialysis and paediatric nursing for hospital groups and day surgery centres'),
        array('fa-user-doctor', 'Specialists and GPs',    'Specialist registration for hospital departments, general practice for clinic and polyclinic networks'),
        array('fa-microscope',  'Allied health',          'Laboratory, radiography, physiotherapy and respiratory therapy on the same licensing route'),
        array('fa-tooth',       'Dental and clinic staff','Dentists, hygienists and clinic managers for the private clinic sector'),
      ),
      'cover' => 'list',
      'list'  => array(
        array('Dubai',            'Licensed through DHA'),
        array('Abu Dhabi and Al Ain','Licensed through DOH'),
        array('Ajman and Sharjah','Licensed through MOHAP, and where our own office sits'),
        array('Northern Emirates','Ras Al Khaimah, Fujairah and Umm Al Quwain, MOHAP'),
      ),
      'note'  => 'We also place into Saudi Arabia, Qatar, Oman, Kuwait and Bahrain. Each has its own authority and its own exam, so ask us for that market by name rather than assuming the UAE route applies.',
    ),

    /* ------------------------------------------------------------------ usa */
    'usa' => array(
      'name'  => 'USA',
      'the'   => 'the ',
      'icon'  => 'fa-earth-americas',
      'area'  => array(array('@type' => 'Country', 'name' => 'United States')),
      'file'  => 'healthcare-recruitment-agency-in-usa.php',
      'blurb' => 'The long route, run properly, with honest dates',
      'opening' => 'The United States is the slowest market we work in and the one candidates are
                    most often misled about. The licensing is passable and the visa is the wall:
                    an employment-based green card for a nurse can sit behind a priority date for
                    years. We will tell you that at the first call rather than at month eighteen,
                    and we work the clearable parts of the file while the date moves.',
      'facts' => array(
        'Who licenses a clinician' => 'The state board of nursing or the state medical board. Licensure is by state, not national',
        'What stands in the way'   => 'For nurses, CGFNS credentials evaluation, the NCLEX-RN and a VisaScreen certificate. For doctors, ECFMG certification through the USMLE',
        'Typical time to joining'  => 'Twelve months at best, and longer when an employment-based priority date is retrogressed',
        'Our desk'                 => 'New Delhi, working to US hospital and staffing-group schedules',
      ),
      'route' => array(
        array('fa-clipboard-check','Credentials evaluated','CGFNS or an equivalent evaluation establishes that the qualification maps to a US one. Nothing else moves until this does.'),
        array('fa-pen-to-square', 'The licensing exam',   'NCLEX-RN for nurses, the USMLE sequence and ECFMG certification for doctors, plus the English requirement the board sets.'),
        array('fa-stamp',         'State board licensure','The board of the state you will work in issues the licence. Moving state later means a fresh endorsement, so we pick the state deliberately.'),
        array('fa-plane',         'VisaScreen and visa',  'VisaScreen certification, then the employment-based petition. We keep the candidate current and employed while the priority date moves.'),
      ),
      'roles' => array(
        array('fa-user-nurse',  'Registered nurses',       'Medical-surgical, critical care, theatre and emergency nursing, which is where sponsorship is real'),
        array('fa-user-doctor', 'Physicians',              'IMG candidates working towards ECFMG certification and a residency position'),
        array('fa-microscope',  'Laboratory and imaging',  'Technologists on the ASCP and ARRT certification routes'),
        array('fa-hand-holding-medical','Therapy services','Physical, occupational and respiratory therapy, credentialled through the relevant state board'),
      ),
      'cover' => 'list',
      'list'  => array(
        array('Hospital systems',    'Multi-site acute care groups hiring on sponsorship'),
        array('Staffing partners',   'US agencies we supply screened international candidates to'),
        array('Long-term care',      'Skilled nursing and rehabilitation, where nurse demand is steadiest'),
        array('Outpatient and imaging','Diagnostic and therapy roles on certification rather than licensure routes'),
      ),
      'note'  => 'We do not promise a visa date, because nobody can. What we commit to is an honest read of your category at the start and a file that is ready the day the date becomes current.',
    ),

    /* --------------------------------------------------------------- europe */
    'europe' => array(
      'name'  => 'Europe',
      'the'   => '',
      'icon'  => 'fa-earth-europe',
      'area'  => array(array('@type' => 'Country', 'name' => 'United Kingdom'),
                       array('@type' => 'Country', 'name' => 'Ireland'),
                       array('@type' => 'Country', 'name' => 'Germany'),
                       array('@type' => 'Country', 'name' => 'Malta')),
      'file'  => 'healthcare-recruitment-agency-in-europe.php',
      'blurb' => 'Language is the gate, so we start there',
      'opening' => 'Europe is not one market and the difference is language. A nurse with the
                    clinical experience for a London intensive care unit still needs an English
                    score before the register will look at them, and Germany will not begin
                    recognition without B2 German. We sequence the language first, because a
                    file that starts anywhere else stalls.',
      'facts' => array(
        'Who registers a clinician' => 'The NMC and the GMC in the United Kingdom, NMBI in Ireland, and the state recognition authority in Germany',
        'What stands in the way'    => 'English at IELTS 7.0 or OET B for the UK, then the CBT and the OSCE. German at B2 and qualification recognition for Germany',
        'Typical time to joining'   => 'Four to nine months, almost entirely decided by how fast the language score arrives',
        'Our desk'                  => 'New Delhi, running UK, Irish and German files',
      ),
      'route' => array(
        array('fa-language',      'Language first',       'IELTS or OET for the UK and Ireland, B2 German for Germany. We tell a candidate their real starting point instead of enrolling them in hope.'),
        array('fa-id-card',       'Register application', 'The NMC, NMBI or GMC application, or the German recognition file, with the evidence each one specifically asks for.'),
        array('fa-desktop',       'The theory test',      'The NMC computer-based test, or PLAB for doctors, sat from India before anyone books a flight.'),
        array('fa-user-check',    'Visa, then the OSCE',  'Health and Care Worker visa, travel, and the practical examination taken after arrival, which the employer normally sponsors.'),
      ),
      'roles' => array(
        array('fa-user-nurse',  'Registered nurses',    'Adult, critical care, theatre and care-of-the-elderly nursing for NHS trusts and private groups'),
        array('fa-user-doctor', 'Doctors',              'Training and non-training posts for candidates on the PLAB route or with an approved postgraduate qualification'),
        array('fa-house-medical','Senior care',         'Nursing and senior care roles, which carry the widest sponsorship in the UK and Ireland'),
        array('fa-microscope',  'Allied health',        'Radiography, physiotherapy and biomedical science on HCPC and equivalent registration'),
      ),
      'cover' => 'list',
      'list'  => array(
        array('United Kingdom', 'NMC and GMC registration, Health and Care Worker visa'),
        array('Ireland',        'NMBI registration, with an adaptation period where required'),
        array('Germany',        'Qualification recognition and B2 German before a contract'),
        array('Malta',          'English-language register, often the quickest way into the EU'),
      ),
      'note'  => 'Immigration rules in these countries change more often than the clinical requirements do. We confirm the current position on your route when we take the brief rather than quoting last year\'s.',
    ),

    );
    return $m;
}

/**
 * The market's name as it reads inside a sentence.
 *
 * "hiring in India" but "hiring in the USA". Without this every heading on
 * two of the four pages reads like a headline rather than English.
 */
function hp_mkt_in($mk) {
    return (isset($mk['the']) ? $mk['the'] : '') . $mk['name'];
}

/** One market by key, or null. */
function hp_market($key) {
    $m = hp_markets();
    return isset($m[$key]) ? $m[$key] : null;
}

/** The market key a page file belongs to, or null for every other page. */
function hp_market_key_for($file) {
    foreach (hp_markets() as $k => $mk) {
        if ($mk['file'] === $file) return $k;
    }
    return null;
}

/**
 * The India city pages, in the order they are shown.
 *
 * Read from include/pages.php rather than listed again here: an entry marked
 * 'india_city' is one of these, so adding a city page to the registry puts it
 * on the India landing page, in the header menu and in the footer without a
 * second edit. The Delhi NCR careers page sits in the same group but is not
 * a city desk, which is why the flag is explicit rather than inferred.
 */
function hp_india_cities() {
    $out = array();
    foreach (hp_pages() as $file => $p) {
        if (!empty($p['india_city'])) $out[$file] = $p;
    }
    return $out;
}

}
