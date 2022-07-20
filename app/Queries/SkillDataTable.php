<?php
namespace App\Queries;

use App\Models\Skill;
use Carbon\Carbon;

class SkillDataTable
{
    /**
     * @return Skill
     */
    public function getSkills()
    {
        $query = Skill::query()->select('skills.*');
        return $query;
    }
}
