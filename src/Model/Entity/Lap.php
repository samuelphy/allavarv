<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
//use Cake\Validation\Validator;



/**
 * Lap Entity.
 */
class Lap extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'milen' => true,
        'femman' => true,
        'elljusspåret' => true,
        'två_och_halvan' => true,
        'tolvhundra' => true,
        'femhundra' => true,
        'löptid' => true,
        'starttid' => true,
        'målgång' => true,
        'user' => true,
        'poäng' => true,
        'starttid' => true,
    ];
    
   /* 
    public function validationDefault(Validator $validator) {
    	return $validator
        	->notEmpty('löptid', 'Du måste ange en gissad löptid.')
        	->add('löptid', [
            	'format' => [
                	'hh:mm:ss',
                	'message' => 'Ange på formatet hh:mm:ss'
            	]
        	]);
	}
	*/
}
