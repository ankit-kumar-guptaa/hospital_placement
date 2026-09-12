<?php
/**
 * pages.php - the single source of truth for every public page.
 *
 * One entry per page carries its route, its SEO head, its target keyword,
 * its hero copy and its schema type. Titles, descriptions, canonicals,
 * breadcrumbs, the sitemap and the page hero all read from here, so they
 * cannot drift apart and no page can end up with a missing or duplicated tag.
 *
 * Keys
 *   file      the real PHP file on disk
 *   route     the clean URL, no extension, no leading slash ('' = home)
 *   kw        primary target keyword for the page
 *   title     <title>, kept under ~60 chars where possible
 *   desc      meta description, 140-160 chars, written to earn the click
 *   h1        the page H1, carries the keyword naturally
 *   lead      answer-first opening line. AEO: answers the page's question
 *             in one sentence, before any marketing
 *   img       key in media.php for the hero photograph
 *   crumb     breadcrumb label
 *   type      schema.org type for the page's primary entity
 *   group     nav grouping, used for related links
 */

if (!defined('HP_SITE')) {
define('HP_SITE',  'https://www.hospitalplacement.com');   // change here if the canonical host is the bare domain
define('HP_BRAND', 'HospitalPlacement.com');
}

if (!function_exists('hp_pages')) {
function hp_pages() {
    static $p = null;
    if ($p !== null) return $p;

    $p = array(

    /* ---------------------------------------------------------------- home */
    'index.php' => array(
      'route' => '', 'kw' => 'healthcare recruitment agency',
      'title' => 'Global Healthcare Recruitment Agency | ' . HP_BRAND,
      'desc'  => 'ISO 9001:2000 certified healthcare recruitment agency placing doctors, nurses and paramedical staff with hospitals in India, the Gulf, the USA and Europe.',
      'h1'    => 'Healthcare Recruitment<br>Made <span class="hp-mark">Simple.</span>',
      'lead'  => 'Connecting hospitals with the right healthcare professionals, and helping candidates find the right opportunities.',
      'img'   => 'hero_team', 'crumb' => 'Home', 'type' => 'EmploymentAgency', 'group' => 'home',
    ),

    /* ------------------------------------------------------------- company */
    'about.php' => array(
      'route' => 'about', 'kw' => 'healthcare recruitment company',
      'title' => 'About Us | Healthcare Recruitment Company Since 2010',
      'desc'  => 'ISO 9001:2000 certified healthcare recruitment company, working only in medical staffing since 2010 from offices in New Delhi and Ajman.',
      'h1'    => 'A healthcare recruitment company, and nothing else',
      'lead'  => 'HospitalPlacement.com has recruited only for healthcare since 2010, placing clinical and hospital administration staff worldwide from our New Delhi and Ajman offices.',
      'img'   => 'about_main', 'crumb' => 'About Us', 'type' => 'AboutPage', 'group' => 'company',
    ),
    'contact.php' => array(
      'route' => 'contact', 'kw' => 'contact healthcare recruitment agency',
      'title' => 'Contact Us | Healthcare Recruitment Agency',
      'desc'  => 'Talk to our healthcare recruitment team in New Delhi or Ajman. Post a hiring requirement or register your CV and a consultant replies within one working day.',
      'h1'    => 'Talk to a healthcare recruitment consultant',
      'lead'  => 'Send us the role, the country and the salary band. A consultant who recruits in that speciality replies within one working day.',
      'img'   => 'contact_hero', 'crumb' => 'Contact Us', 'type' => 'ContactPage', 'group' => 'company',
    ),
    'solutions.php' => array(
      'route' => 'solutions', 'kw' => 'healthcare recruitment solutions',
      'title' => 'Healthcare Recruitment Solutions for Hospitals',
      'desc'  => 'Recruitment process outsourcing, pay on success hiring, pre-screening and head hunting for hospitals, nursing homes and diagnostic centres worldwide.',
      'h1'    => 'Healthcare recruitment solutions for hospitals',
      'lead'  => 'Hand us the whole recruitment cycle or only the roles your own team cannot reach. Both work, and both are billed on success.',
      'img'   => 'solutions_media', 'crumb' => 'Solutions', 'type' => 'Service', 'group' => 'company',
    ),
    'jobs.php' => array(
      'route' => 'jobs', 'kw' => 'healthcare jobs',
      'title' => 'Healthcare Jobs | Doctor, Nurse &amp; Paramedical Vacancies',
      'desc'  => 'Register once for healthcare jobs across India, the Gulf, the USA and Europe. Doctor, nurse, paramedical, pharma and hospital administration vacancies.',
      'h1'    => 'Healthcare jobs, matched to your speciality',
      'lead'  => 'Register once and a consultant who knows your speciality works your case against live hospital vacancies. Registration is free for candidates.',
      'img'   => 'jobs_hero', 'crumb' => 'Jobs', 'type' => 'CollectionPage', 'group' => 'company',
    ),
    'privacy-policy.php' => array(
      'route' => 'privacy-policy', 'kw' => 'privacy policy',
      'title' => 'Privacy Policy | ' . HP_BRAND,
      'desc'  => 'How HospitalPlacement.com collects, uses and protects the personal data of hospitals and healthcare candidates who contact us.',
      'h1'    => 'Privacy Policy',
      'lead'  => 'This page explains what we collect when you post a requirement or register a CV, how we use it, and how to ask us to remove it.',
      'img'   => 'about_inset', 'crumb' => 'Privacy Policy', 'type' => 'WebPage', 'group' => 'legal',
    ),

    /* ------------------------------------------------------------ services */
    'doctor-placement-services.php' => array(
      'route' => 'doctor-placement-services', 'kw' => 'doctor placement services',
      'title' => 'Doctor Placement Services | Doctor Recruitment Agency',
      'desc'  => 'Doctor placement services for hospitals: consultants, residents, super-specialists and heads of department, screened for registration before shortlisting.',
      'h1'    => 'Doctor placement services for hospitals',
      'lead'  => 'We place consultants, residents and super-specialists across every major department, with registration and qualifications verified before you see a CV.',
      'img'   => 'svc_doctor', 'crumb' => 'Doctor Placement', 'type' => 'Service', 'group' => 'hospitals',
      'faq' => array(
        array('q' => 'Which doctor roles do you recruit for?',
              'a' => 'Consultants, senior and junior residents, registrars, super-specialists and heads of department, across cardiology, orthopaedics, general and laparoscopic surgery, gynaecology, paediatrics, anaesthesia, radiology, gastroenterology, nephrology, oncology and general medicine.'),
        array('q' => 'How do you verify a doctor before shortlisting?',
              'a' => 'We check medical council registration, verify the primary and post-graduate qualification documents, confirm the last-held position with the employer, and interview for speciality depth before any CV reaches your panel.'),
        array('q' => 'How long does a consultant search take?',
              'a' => 'Ward and junior posts usually move fastest because we hold pre-screened candidates. Super-speciality and head of department searches take longer because they are head hunted rather than advertised. We commit to a timeline when we take the brief.'),
      ),
    ),
    'nurse-staffing-agency-india.php' => array(
      'route' => 'nurse-staffing-agency', 'kw' => 'nurse staffing agency',
      'title' => 'Nurse Staffing Agency | ICU, OT &amp; Ward Nursing',
      'desc'  => 'Nurse staffing agency supplying ICU, theatre, ward and speciality nurses to hospitals and nursing homes, from staff nurse to nurse manager.',
      'h1'    => 'Nurse staffing agency for hospitals and nursing homes',
      'lead'  => 'We supply ICU, theatre, ward and speciality nurses, from staff nurse to nurse manager, with council registration checked before shortlisting.',
      'img'   => 'svc_nurse', 'crumb' => 'Nurse Staffing', 'type' => 'Service', 'group' => 'hospitals',
      'alias' => 'nurse-staffing-agency-india',
      'faq' => array(
        array('q' => 'What nursing roles do you supply?',
              'a' => 'Staff nurses, senior staff nurses, nursing supervisors, ward in-charge and nurse managers, across ICU and critical care, operation theatre, emergency, dialysis, neonatal, oncology, cardiac, orthopaedic and general wards.'),
        array('q' => 'Do you check nursing council registration?',
              'a' => 'Yes. State nursing council registration and the qualification certificate, whether ANM, GNM, B.Sc Nursing, post-basic B.Sc or M.Sc, are verified before a candidate is shortlisted.'),
        array('q' => 'Can you staff a whole nursing establishment?',
              'a' => 'Yes. We staff new units and whole floors end to end, from nurse manager down, and phase the joining dates around your commissioning schedule.'),
      ),
    ),
    'paramedical-recruitment-agency.php' => array(
      'route' => 'paramedical-recruitment-agency', 'kw' => 'paramedical recruitment agency',
      'title' => 'Paramedical Recruitment Agency | Lab, Radiology, OT',
      'desc'  => 'Paramedical recruitment agency for laboratory, radiology, dialysis, cardiac and operation theatre technicians, plus physiotherapy and allied health roles.',
      'h1'    => 'Paramedical recruitment agency',
      'lead'  => 'We recruit laboratory, radiology, dialysis, cardiac and theatre technicians, plus physiotherapy and allied health staff, for hospitals and diagnostic centres.',
      'img'   => 'svc_para', 'crumb' => 'Paramedical Recruitment', 'type' => 'Service', 'group' => 'hospitals',
      'faq' => array(
        array('q' => 'Which paramedical roles do you recruit for?',
              'a' => 'Laboratory technicians and technologists, radiographers and imaging technicians, dialysis technicians, cardiac and cath lab technicians, operation theatre technicians, physiotherapists, and optometry and audiology staff.'),
        array('q' => 'Do you recruit for diagnostic centres as well as hospitals?',
              'a' => 'Yes. Standalone laboratories, imaging centres and dialysis units hire through us on the same pay on success terms as hospitals.'),
      ),
    ),
    'specialty-placement.php' => array(
      'route' => 'specialty-placement', 'kw' => 'specialty medical placement',
      'title' => 'Specialty Placements | Hard to Fill Clinical Roles',
      'desc'  => 'Specialty medical placement for the roles job adverts do not reach: super-specialists, heads of department and single-post clinical vacancies.',
      'h1'    => 'Specialty placements for hard to fill clinical roles',
      'lead'  => 'When a post has stayed open for months we head hunt it instead of advertising it, approaching the specialists who are not reading job boards.',
      'img'   => 'svc_specialty', 'crumb' => 'Specialty Placements', 'type' => 'Service', 'group' => 'hospitals',
    ),
    'permanent-placement.php' => array(
      'route' => 'permanent-placement', 'kw' => 'permanent healthcare placement',
      'title' => 'Permanent Placement | Pay on Success Hiring',
      'desc'  => 'Permanent healthcare placement on a pay on success model. No retainer, no listing fee, and our fee falls due only once your candidate joins.',
      'h1'    => 'Permanent placement, billed on success',
      'lead'  => 'There is no retainer and no listing fee. Our fee falls due when your candidate joins and clears the guarantee period agreed before the search starts.',
      'img'   => 'svc_permanent', 'crumb' => 'Permanent Placement', 'type' => 'Service', 'group' => 'hospitals',
      'faq' => array(
        array('q' => 'What does pay on success mean?',
              'a' => 'There is no retainer and no listing fee. Our fee falls due only when your candidate joins and clears the guarantee period agreed in writing before the search starts.'),
        array('q' => 'What happens if the candidate leaves early?',
              'a' => 'That is what the guarantee period covers. If the candidate leaves inside it we run the search again at no further placement fee, on the terms agreed at the start.'),
      ),
    ),
    'temporary-staffing-services.php' => array(
      'route' => 'temporary-staffing-services', 'kw' => 'temporary medical staffing',
      'title' => 'Temporary Staffing Services | Locum &amp; Contract Cover',
      'desc'  => 'Temporary medical staffing for short notice cover: locum doctors, contract nurses and technicians, pre-screened and ready for urgent hospital gaps.',
      'h1'    => 'Temporary staffing services for urgent cover',
      'lead'  => 'A resignation on a critical ward does not wait. We hold pre-screened locum and contract staff ready for short notice gaps.',
      'img'   => 'svc_temp', 'crumb' => 'Temporary Staffing', 'type' => 'Service', 'group' => 'hospitals',
      'faq' => array(
        array('q' => 'How quickly can you send locum cover?',
              'a' => 'For common ward, nursing and technician roles we hold pre-screened candidates and can usually put names forward the same week. A speciality locum depends on the speciality and the location.'),
        array('q' => 'Is temporary staffing billed differently to permanent?',
              'a' => 'Yes. Locum and contract cover is billed against the assignment rather than as a one-off placement fee. We agree the rate in writing before the assignment starts.'),
      ),
    ),
    'healthcare-recruitment-for-hospitals.php' => array(
      'route' => 'healthcare-recruitment-for-hospitals', 'kw' => 'healthcare recruitment for hospitals',
      'title' => 'Healthcare Recruitment for Hospitals | Whole Departments',
      'desc'  => 'Healthcare recruitment for hospitals, from a single vacancy to a whole department or a greenfield unit staffed end to end before opening day.',
      'h1'    => 'Healthcare recruitment for hospitals',
      'lead'  => 'From one vacancy to a whole department, we run sourcing, screening, interview scheduling and joining so your HR team stays on retention.',
      'img'   => 'svc_hospitals', 'crumb' => 'Recruitment for Hospitals', 'type' => 'Service', 'group' => 'hospitals',
      'faq' => array(
        array('q' => 'Can you handle hiring for a whole department?',
              'a' => 'Yes. We run sourcing, screening, interview scheduling, offer and joining for a single department or for a whole new unit, and phase the joining dates around your opening schedule.'),
        array('q' => 'Do we have to use you for every role?',
              'a' => 'No. Many hospitals use us only for the posts their own team cannot reach, and keep routine hiring in house. Both arrangements work on the same terms.'),
      ),
    ),
    'hospital-recruitment-agency-in-india.php' => array(
      'route' => 'hospital-recruitment-agency-in-india', 'kw' => 'hospital recruitment agency in india',
      'title' => 'Hospital Recruitment Agency in India | Nationwide',
      'desc'  => 'Hospital recruitment agency covering India nationwide from New Delhi, placing doctors, nurses, paramedical and administration staff since 2010.',
      'h1'    => 'Hospital recruitment agency in India',
      'lead'  => 'We recruit for hospitals across India from our New Delhi office, with dedicated desks for Delhi NCR, Mumbai, Hyderabad, Chandigarh, Kolkata and Lucknow.',
      'img'   => 'city_delhi', 'crumb' => 'Recruitment Agency in India', 'type' => 'Service', 'group' => 'hospitals',
    ),

    /* ------------------------------------------------------------ location */
    'recruitment-agency-in-delhi-and-placement-consultants-in-delhi-ncr-job-placement-consultacy.php' => array(
      'route' => 'recruitment-agency-in-delhi-ncr', 'kw' => 'recruitment agency in delhi',
      'title' => 'Recruitment Agency in Delhi | Placement Consultants Delhi NCR',
      'desc'  => 'Healthcare recruitment agency and placement consultants in Delhi NCR. Doctors, nurses and paramedical staff for hospitals across Delhi, Noida and Gurugram.',
      'h1'    => 'Recruitment agency in Delhi and placement consultants for Delhi NCR',
      'lead'  => 'Our head office is in Okhla, New Delhi, and Delhi NCR is the market we know best: its pay bands, its notice periods and its commute realities.',
      'img'   => 'city_delhi', 'crumb' => 'Delhi NCR', 'type' => 'Service', 'group' => 'locations',
      'city'  => 'Delhi NCR', 'alias' => 'recruitment-agency-in-delhi-and-placement-consultants-in-delhi-ncr-job-placement-consultacy',
    ),
    'hospital-job-consultants-delhi-ncr-india.php' => array(
      'route' => 'hospital-job-consultants-delhi-ncr', 'kw' => 'hospital job consultants delhi ncr',
      'title' => 'Hospital Job Consultants in Delhi NCR | Career Guidance',
      'desc'  => 'Hospital job consultants for Delhi NCR. Career guidance, CV review and interview preparation for doctors, nurses and paramedical professionals.',
      'h1'    => 'Hospital job consultants in Delhi NCR',
      'lead'  => 'If you are a healthcare professional looking to move within Delhi NCR, a consultant who knows your speciality works your case personally.',
      'img'   => 'city_consultants', 'crumb' => 'Hospital Job Consultants', 'type' => 'Service', 'group' => 'locations',
      'city'  => 'Delhi NCR',
    ),
    'placement-Agency-in-mumbai.php' => array(
      'route' => 'placement-agency-in-mumbai', 'kw' => 'placement agency in mumbai',
      'title' => 'Placement Agency in Mumbai | Hospital Staffing',
      'desc'  => 'Healthcare placement agency in Mumbai supplying doctors, nurses and paramedical staff to hospitals, nursing homes and diagnostic centres across MMR.',
      'h1'    => 'Placement agency in Mumbai for hospital staffing',
      'lead'  => 'We recruit for hospitals across Mumbai and the wider MMR, benchmarking every offer against what the city actually pays for that speciality.',
      'img'   => 'city_mumbai', 'crumb' => 'Mumbai', 'type' => 'Service', 'group' => 'locations', 'city' => 'Mumbai',
    ),
    'placement-Agency-in-hyderabad.php' => array(
      'route' => 'placement-agency-in-hyderabad', 'kw' => 'placement agency in hyderabad',
      'title' => 'Placement Agency in Hyderabad | Hospital Staffing',
      'desc'  => 'Healthcare placement agency in Hyderabad supplying doctors, nurses and paramedical staff to hospitals and diagnostic centres across the city.',
      'h1'    => 'Placement agency in Hyderabad for hospital staffing',
      'lead'  => 'We recruit for hospitals across Hyderabad and Secunderabad, from single consultant posts to whole nursing establishments.',
      'img'   => 'city_hyderabad', 'crumb' => 'Hyderabad', 'type' => 'Service', 'group' => 'locations', 'city' => 'Hyderabad',
    ),
    'placement-Agency-in-chandigarh.php' => array(
      'route' => 'placement-agency-in-chandigarh', 'kw' => 'placement agency in chandigarh',
      'title' => 'Placement Agency in Chandigarh | Tricity Hospital Staffing',
      'desc'  => 'Healthcare placement agency covering Chandigarh, Mohali and Panchkula, supplying doctors, nurses and paramedical staff to hospitals across the Tricity.',
      'h1'    => 'Placement agency in Chandigarh and the Tricity',
      'lead'  => 'We cover Chandigarh, Mohali and Panchkula as one market, which is how candidates there actually think about a commute.',
      'img'   => 'city_chandigarh', 'crumb' => 'Chandigarh', 'type' => 'Service', 'group' => 'locations', 'city' => 'Chandigarh',
    ),
    'placement-Agency-in-kolkata.php' => array(
      'route' => 'placement-agency-in-kolkata', 'kw' => 'placement agency in kolkata',
      'title' => 'Placement Agency in Kolkata | Hospital Staffing',
      'desc'  => 'Healthcare placement agency in Kolkata supplying doctors, nurses and paramedical staff to hospitals, nursing homes and diagnostic centres.',
      'h1'    => 'Placement agency in Kolkata for hospital staffing',
      'lead'  => 'We recruit for hospitals and nursing homes across Kolkata and Howrah, including the speciality posts that stay open longest.',
      'img'   => 'city_kolkata', 'crumb' => 'Kolkata', 'type' => 'Service', 'group' => 'locations', 'city' => 'Kolkata',
    ),
    'placement-Agency-in-lucknow.php' => array(
      'route' => 'placement-agency-in-lucknow', 'kw' => 'placement agency in lucknow',
      'title' => 'Placement Agency in Lucknow | Hospital Staffing',
      'desc'  => 'Healthcare placement agency in Lucknow supplying doctors, nurses and paramedical staff to hospitals and nursing homes across Uttar Pradesh.',
      'h1'    => 'Placement agency in Lucknow for hospital staffing',
      'lead'  => 'We recruit for hospitals in Lucknow and across Uttar Pradesh, where relocation willingness matters as much as the qualification.',
      'img'   => 'city_lucknow', 'crumb' => 'Lucknow', 'type' => 'Service', 'group' => 'locations', 'city' => 'Lucknow',
    ),
    );
    return $p;
}

/**
 * Which registry file is being served.
 *
 * Resolved in three steps, because the answer differs by environment:
 * Apache rewrites /about to about.php so SCRIPT_NAME is enough there, while
 * PHP's built-in server reports the router instead. Matching the requested
 * route covers that, and an explicit override covers anything unusual.
 */
function hp_current_file() {
    $pages = hp_pages();

    if (!empty($GLOBALS['hp_page_file']) && isset($pages[$GLOBALS['hp_page_file']])) {
        return $GLOBALS['hp_page_file'];
    }

    /* The requested route comes first. PHP's built-in server reports
       SCRIPT_NAME as /index.php for any extensionless URL, so trusting that
       ahead of the route would label every page as the home page. */
    $uri  = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    $path = trim((string) parse_url($uri, PHP_URL_PATH), '/');
    if ($path === '') return 'index.php';
    foreach ($pages as $f => $p) {
        if ($p['route'] !== '' && strcasecmp($path, $p['route']) === 0) return $f;
        if (!empty($p['alias']) && strcasecmp($path, $p['alias']) === 0) return $f;
    }

    /* A direct .php hit, or any path the registry does not own. */
    $sn = basename(isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '');
    if (isset($pages[$sn])) return $sn;

    return null;
}

/** The registry entry for the page currently being served. */
function hp_page($file = null) {
    $pages = hp_pages();
    if ($file === null) $file = hp_current_file();
    return ($file !== null && isset($pages[$file])) ? $pages[$file] : null;
}

/**
 * Clean URL for a registry file, or for a raw path we do not own.
 * Always root-absolute, so it resolves identically from /, from a clean
 * route and from inside /blog/.
 */
function hp_url($file = '') {
    if ($file === '' || $file === 'index.php') return '/';
    $pages = hp_pages();
    if (isset($pages[$file])) {
        $r = $pages[$file]['route'];
        return $r === '' ? '/' : '/' . $r;
    }
    return '/' . ltrim($file, '/');
}

/** Absolute URL, for canonicals, Open Graph and structured data. */
function hp_abs($file = '') {
    return HP_SITE . hp_url($file);
}
}

/**
 * Keep .htaccess in step with the registry, with nobody having to remember.
 *
 * The rules above are the only place routes are defined, so the moment this
 * file changes the Apache rules are stale. Rather than leave that to a build
 * step somebody has to run, the first page load after an edit rewrites them.
 * It compares modification times, so on every other request this costs a stat
 * and nothing else, and it stays silent when the document root is read only,
 * because the site still has to serve.
 */
if (PHP_SAPI !== 'cli' && !defined('HP_NO_HTACCESS_SYNC')) {
    require_once __DIR__ . '/htaccess.php';
    hp_htaccess_sync(dirname(__DIR__));
}
