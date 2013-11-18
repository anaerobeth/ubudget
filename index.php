<?php
// include config
require 'config.php';

// get cities
$cities = R::findAll('cities');

// generate Pie
function getPie($data=null, $json=false, $conditions=' 1', $vars=array()) {
    
    // filter data
    if (isset($data) && is_array($data)) {
        $vars = array();
        if (isset($data['gender']) && $data['gender'] != '') {
            $conditions .= ' AND gender=:gender ';
            $vars['gender'] = $data['gender'];
        }
        if (isset($data['age']) && $data['age'] > 0) {
            $conditions .= ' AND (age BETWEEN :age_from AND :age_to) ';
            $vars['age_from'] = (int)($data['age']-1);
            $vars['age_to'] = (int)$data['age'];
        }
        if (isset($data['salary']) && $data['salary'] > 0) {
            $conditions .= ' AND (salary BETWEEN :salary_from AND :salary_to) ';
            $vars['salary_from'] = (int)($data['salary']-10000);
            $vars['salary_to'] = (int)$data['salary'];
        }
        if (isset($data['cities']) && $data['cities'] != '') {
            $conditions .= ' AND location=:location ';
            $vars['location'] = $data['cities'];
        }
    }
    
    $total = R::getAll("SELECT count(id) AS respondents,
                            COALESCE(SUM(social_services),0) AS social_services,  
                            COALESCE(SUM(economic_services),0) AS economic_services,
                            COALESCE(SUM(public_services),0) AS public_services,
                            COALESCE(SUM(debt_services),0) AS debt_services,
                            COALESCE(SUM(defense),0) AS defense
                        FROM survey WHERE {$conditions}", $vars);
    if ($total && !$json) {
        $pie = '';
        $pie .= "[['Sectors','Response'],";
        $pie .= "['Social Services', {$total[0]['social_services']}],";
        $pie .= "['Economic Services', {$total[0]['economic_services']}],";
        $pie .= "['Public Services', {$total[0]['social_services']}],";
        $pie .= "['Debt Burden', {$total[0]['social_services']}],";
        $pie .= "['Defense', {$total[0]['debt_services']}]]";
        $count = $total[0]['respondents'];
        return $pie .'|'. $count;
    } else {
        return $total;
    }
    
}

/* 
 * ================
 * ROUTES
 * ================
 */

/*
 * Home group
 */
$app->group('/', function () use ($app) {
    
    // GET homepage
    $app->get('/', function () use ($app) {
        global $cities;
        $value = getPie();
        if (isset($value) && $value != '') {
            $pies = explode("|", $value);
            $pie = trim($pies[0]);
            $respondents = trim($pies[1]);
        }
        $app->render('index.php', array('cities'=>$cities, 'pie'=>$pie, 'respondents'=>$respondents));
        
    });

    // POST homepage
    $app->post('/', function () use ($app) {
        global $cities;
        $data = $app->request->post();
        
        $value = getPie($data);
        if (isset($value) && $value != '') {
            $pies = explode("|", $value);
            $pie = trim ($pies[0]);
            $respondents = trim($pies[1]);
        }
        
        $app->render('index.php', array('cities'=>$cities, 'pie'=>$pie, 'respondents'=>$respondents));
 
    });
    
});

/*
 * Survey Group
 */
$app->group('/survey', function () use ($app) {
    
    // GET new survey form
    $app->get('/new', function () use ($app) {
        global $cities;
        $app->render('survey.new.php', array('cities'=>$cities));
    });

    // POST submit survey form
    $app->post('/submitted', function () use ($app) {
        
        $data = $app->request->post();
        
        // trap spambots
        if ($data['trap'] != '') {
            $app->response->redirect(BASE_URL, 303);
        }
        
        $survey = R::dispense('survey');
        $survey->ip_address = $_SERVER["REMOTE_ADDR"];
        $survey->gender = $data['gender'];
        $survey->age = $data['age'];
        $survey->salary = $data['salary'];
        $survey->location = $data['cities'];
        $survey->comment = $data['comment'];
        
        $survey->social_services = $data['social_services'];
        $survey->economic_services = $data['economic_services'];
        $survey->public_services = $data['public_services'];
        $survey->debt_services = $data['debt_services'];
        $survey->defense = $data['defense'];
        
        $survey->created = R::isoDateTime(); 
        $id = R::store($survey);
        
        // generate demographics pie
        $value = getPie($data);
        if (isset($value) && $value != '') {
            $pies = explode("|", $value);
            $pie = trim ($pies[0]);
            $respondents = trim($pies[1]);
        }
        $app->render('survey.submitted.php', array('pie'=>$pie, 'respondents'=>$respondents));
        
    });
    
});

/*
 * API Group
 */
$app->group('/api', function () use ($app) {
        
    $app->get('/cities', function () use ($app) {
        $cities = R::getAll('SELECT id, name FROM cities');
        if ($cities) {
            echo json_encode($cities);
        } else {
            return false;
        }
    });
    
    $app->get('/sectors', function () use ($app) {
        $sectors = R::getAll('SELECT a.id AS sector_id, a.name AS sector_name, b.name AS sector_details_name 
                                FROM sectors a, sectors_details b WHERE a.id=b.sector_id');
        if ($sectors) {
            echo json_encode($sectors);
        } else {
            echo false;
        }
    });
    
    $app->get('/sectors/:id', function ($id) use ($app) {
        $sectors = R::getAll('SELECT sector_id AS sector_id, id AS sector_details_id, name AS sector_details_name 
                                FROM sectors_details WHERE sector_id=:sector_id', array(':sector_id'=>$id));
        if ($sectors) {
            echo json_encode($sectors);
        } else {
            echo false;
        }
    });
    
    // POST submit survey form
    $app->post('/submit', function () use ($app) {
        
        $data = $app->request->post();
        
        // trap spambots
        if ($data['trap'] != '') {
            $app->response->redirect(BASE_URL, 303);
        }
        
        $survey = R::dispense('survey');
        $survey->ip_address = $_SERVER["REMOTE_ADDR"];
        $survey->gender = $data['gender'];
        $survey->age = $data['age'];
        $survey->salary = $data['salary'];
        $survey->location = $data['cities'];
        $survey->comment = $data['comment'];
        
        $survey->social_services = $data['social_services'];
        $survey->economic_services = $data['economic_services'];
        $survey->public_services = $data['public_services'];
        $survey->debt_services = $data['debt_services'];
        $survey->defense = $data['defense'];
        
        $survey->created = R::isoDateTime(); 
        $id = R::store($survey);
        
        if ($id) {
            echo true;
        } else {
            echo false;
        }
    });
    
    $app->get('/survey/get(/:keys)', function ($keys=null) use ($app) {
        
        if (isset($keys) && $keys != '') {
            $search = explode(";",urldecode($keys));
            $data['gender'] = trim($search[0]);
            $data['age'] = trim($search[1]);
            $data['salary'] = trim($search[2]);            
            $data['cities'] = trim($search[3]);
        }
        
        // generate json file
        $pie = getPie($data, true);
        if (isset($pie) && is_array($pie)) {
            echo json_encode($pie);
        } else {
            echo false;
        }
        
    });
    
    // Seed data to the survey
    $app->get('/seed(/:count)', function ($count=10) use ($app) {
    
        for($i=1;$i<=$count;$i++) {
            $survey = R::dispense('survey');
            $survey->ip_address = $_SERVER["REMOTE_ADDR"];
            $survey->gender = (rand(0,1) == 1) ? 'F' : 'M';
            $survey->age = rand(1,100);
            $survey->salary = rand(10000,1500000);
            $survey->location = rand(1,17);
            $survey->comment = "My random comment {$i}";

            $survey->social_services = rand(1,10);
            $survey->economic_services = rand(1,10);
            $survey->public_services = rand(1,10);
            $survey->debt_services = rand(1,10);
            $survey->defense = rand(1,10);

            $survey->created = R::isoDateTime(); 
            $id = R::store($survey);
        }
        echo "Seeded {$count} sample data";
    });
    
});

// Run app
$app->run();
