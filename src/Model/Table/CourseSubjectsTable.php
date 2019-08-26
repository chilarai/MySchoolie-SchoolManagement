<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Filters Model
 *
 */
class CourseSubjectsTable extends Table
{
	
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

       // $this->addBehavior('Search.Search');

        $this->table('course_subjects');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id'
        ]);

        $this->belongsTo('Subjects', [
            'foreignKey' => 'subject_id'
        ]);
        
    }

    
}

?>