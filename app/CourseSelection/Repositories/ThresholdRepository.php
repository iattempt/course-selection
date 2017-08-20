<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Repository\CurriculumRepository as Curriculum;
use Repository\Threshold1Repository as Threshold1;
use Repository\Threshold2Repository as Threshold2;
use App\User as User;
use Model\Unit as Unit;

class ThresholdRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    protected $user_id;
    protected $user_unit_ids;
    protected $result;
    protected $curriculum;
    protected $credit;
    public function __construct($id){
        $this->user_id = $id;
        $this->curriculum = (new Curriculum)->instance()->suitOwn($id)->get()->sortBy('state');
    }
    /*
     * para     user_id
     * return   ['course_id', 'course_name', 'year', 'semester', 'credit', 'type']
     */
    public function suitCurriculum()
    {
        $this->result = [];
        $i = 0;
        $user_unit_id = User::find($this->user_id)->student->unit_id;
        $this->user_unit_ids = [];
        $this->user_unit_ids[0] = $user_unit_id;
        $this->user_unit_ids[1] = Unit::find($user_unit_id)->unit_base_id;

        foreach ($this->curriculum as $value) {
            if ($value->course) {
                $temp = [];
                $temp['course_id']   = $value->course->id;
                $temp['course_name'] = $value->course->name;
                $temp['year']        = $value->course->year;
                $temp['semester']    = $value->course->semester;
                $temp['credit']      = $value->course->course_base->credit;
                $temp['state']       = $value->state;

                //判定型別
                $isNotSetType = true;
                foreach ($value->course->types as $ct)
                    foreach ($this->user_unit_ids as $unit_id)
                        if ($ct->unit_id == $unit_id) {
                            $isNotSetType = false;
                            $temp['type'] = $ct->type->name;
                            //預設為樹枝節點的修別
                            break 2;
                        }
                if ($isNotSetType)
                    foreach ($value->course->types as $ct) 
                        if ($ct->unit_id == 2) {
                            $isNotSetType = false;
                            $temp['type'] = $ct->type->name;
                            //預設為樹枝節點的修別
                            break;
                        }
                if ($isNotSetType)
                    $temp['type'] = null;
                $i++;
                $this->result[$i] = $temp;
            }
        }

        return $this;
    }
    /*
     * para     userid
     * return   []
     */
    public function suitType($type)
    {
        $j = 0;
        $temp = [];
        foreach ($this->result as $value)
            if ($value['type'] == $type) {
                $temp[$j] = $value;
                unset($temp[$j]['type']);
                $j++;
            }
        $this->result = $temp;

        return $this;
    }
    
    public function suitState($state)
    {
        $j = 0;
        $temp = [];
        foreach ($this->result as $value)
            if ($value['state'] == $state) {
                $temp[$j] = $value;
                unset($temp[$j]['state']);
                $j++;
            }
        $this->result = $temp;

        return $this;
    }

    public function copy()
    {
        $new = new ThresholdRepository($this->user_id);
        $new->result = $this->result;
        $new->curriculum = $this->curriculum;
        $new->user_unit_ids = $this->user_unit_ids;
        $new->credit = $this->credit;

        return $new;
    }

    public function suitAllTypeAndState($state)
    {
        $this->suitState($state);
        
        $force = $this->copy();
        $force_elective = $this->copy();
        $common_force = $this->copy();
        $elective= $this->copy();
        $humanities = $this->copy();
        $natures = $this->copy();
        $societies = $this->copy();
        $civilizations = $this->copy();

        $force->suitType('必修');
        $force_elective->suitType('必選修');
        $common_force->suitType('共必修');
        $elective->suitType('選修');
        $humanities->suitType('通識人文');
        $societies->suitType('通識社會');
        $natures->suitType('通識自然');
        $civilizations->suitType('通識文明與經典');

        $this->result = [];
        $this->result['必修'] = $force->getList();
        $this->result['必選修'] = $force_elective->getList();
        $this->result['共必修'] = $common_force->getList();
        $this->result['選修'] = $elective->getList();
        $this->result['通識人文'] = $humanities->getList();
        $this->result['通識社會'] = $societies->getList();
        $this->result['通識自然'] = $natures->getList();
        $this->result['通識文明與經典'] = $civilizations->getList();

        return $this;
    }

    public function suitAll()
    {
        $this->suitCurriculum();

        $pre_select = $this->copy();
        $current = $this->copy();
        $passed = $this->copy();

        $pre_select->suitAllTypeAndState('預選中');
        $current->suitAllTypeAndState('修課中');
        $passed->suitAllTypeAndState('已修完');

        $this->result = [];
        $this->result['預選中'] = $pre_select->getList();
        $this->result['修課中'] = $current->getList();
        $this->result['已修完'] = $passed->getList();
        
        return $this;
    }

    public function getCreditPerType()
    {
        //取得各別總學分

        $temp = [];
        foreach ($this->result as $state_key => $state_value) {
            $temp[$state_key] = [];
            foreach ($state_value as $type_key => $type_value) {
                $temp[$state_key][$type_key] = 0;
                foreach ($type_value as $course)
                    $temp[$state_key][$type_key] += $course['credit'];
            }
        }

        return $temp;
    }

    public function addFieldOfTotalCredit($credit_of_all_type)
    {
        //-----------------
        //新增總學分之陣列
        $temp = $credit_of_all_type;
        foreach ($this->result['預選中'] as $type_key => $type)
            $temp['總學分'][$type_key] = 0;
        $temp['總學分']['通識'] = 0;
        unset($temp['總學分']['通識人文']);
        unset($temp['總學分']['通識社會']);
        unset($temp['總學分']['通識自然']);
        unset($temp['總學分']['通識文明與經典']);

        return $temp;
    }

    public function getCreditOfForce($credit_of_total_field)
    {
        $temp = $credit_of_total_field;
        $threshold_list = (new Threshold1)->instance()->suitUnit($this->user_unit_ids[0])->get();
        foreach ($threshold_list as $threshold)
            $temp[$threshold->type->name] += $threshold->course_base->credit;

        return $temp;
    }

    public function getCreditOfCommonAndElective($credit_of_total_field)
    {
        $temp = $credit_of_total_field;
        $threshol_list = (new Threshold2)->instance()->suitUnit($this->user_unit_ids[0])->get();
        foreach ($threshol_list as $threshold)
            $temp[$threshold->type->name] += $threshold->credit;

        return $temp;
    }

    public function getCreditOfRemainAndState()
    {
        //----------------
        //取得欠缺之學分
        $this->credit['未修過'] = $this->credit['總學分'];

        $hum_count = 0;
        $soc_count = 0;
        $nat_count = 0;
        $civ_count = 0;
        foreach ($this->credit as $state_key => $state_value) {
            if ($state_key == '未修過'
                || $state_key == '總學分')
                continue;

            foreach ($state_value as $type_key => $type_value) {
                if ($type_key == '通識人文'
                    || $type_key == '通識自然'
                    || $type_key == '通識社會'
                    || $type_key == '通識文明與經典')
                    $this->credit['未修過']['通識'] -= $type_value;
                else 
                    $this->credit['未修過'][$type_key] -=$type_value;
                
                //確認涵括領域
                if ($type_key == '通識人文' && $type_value) $hum_count = 1;
                if ($type_key == '通識自然' && $type_value) $soc_count = 1;
                if ($type_key == '通識社會' && $type_value) $nat_count = 1;
                if ($type_key == '通識文明與經典' && $type_value) $civ_count = 1;
            }
        }
        //----------------
        //取得學分狀態
        $this->credit['學分狀態'] = $this->credit['未修過'];
        foreach ($this->credit['學分狀態'] as $key => $value)
            $this->credit['學分狀態'][$key] = $value==0 ? '已達標準' : '學分不足';
        $this->credit['學分狀態']['通識'] .= ($hum_count+$soc_count+$nat_count+$civ_count)<3 ? '、不足三領域' : '';
    }

    public function separateCreditBetweenTotalAndOther()
    {
        //分類總學分與各項學分
        $temp = [];
        $temp['學分狀態'] = $this->credit['學分狀態'];
        $temp['總學分'] = $this->credit['總學分'];
        $temp['細項學分'] = [];
        foreach ($this->credit as $key => $value)
            if ($key != '總學分' && $key !='學分狀態')
                $temp['細項學分'][$key] = $this->credit[$key];
        $this->credit = $temp;
    }

    public function calcPercentagesForCanvas()
    {
        //----------------
        //取得Canvas數值
        //此數數值是尚未遞增
        $this->credit['Canvas'] = $this->credit['細項學分'];
        
        //合併通識細項成大項
        foreach ($this->credit['Canvas'] as $state_key => $stete_value) {
            if ($state_key != '未修過')
                $this->credit['Canvas'][$state_key]['通識'] = 0;
            foreach ($this->credit['Canvas'][$state_key] as $type_key => $type_value)
                if ($type_key == '通識人文'
                    || $type_key == '通識自然'
                    || $type_key == '通識社會'
                    || $type_key == '通識文明與經典')
                    $this->credit['Canvas'][$state_key]['通識'] += $this->credit['Canvas'][$state_key][$type_key];

            unset($this->credit['Canvas'][$state_key]['通識人文']);
            unset($this->credit['Canvas'][$state_key]['通識自然']);
            unset($this->credit['Canvas'][$state_key]['通識社會']);
            unset($this->credit['Canvas'][$state_key]['通識文明與經典']);
        }
        foreach ($this->credit['Canvas'] as $state_key => $stete_value)
            foreach ($this->credit['Canvas'][$state_key] as $type_key => $type_value) {
                $temp = ($this->credit['總學分'][$type_key] == 0) ? 0
                        : ($this->credit['Canvas'][$state_key][$type_key] / $this->credit['總學分'][$type_key] * 2);
                $this->credit['Canvas'][$state_key][$type_key] = [];
                $this->credit['Canvas'][$state_key][$type_key]['end'] = $temp;
            }

        //反轉狀態/修別 => 修別/狀態
        $temp = [];
        foreach ($this->credit['Canvas']['預選中'] as $type_key => $type_value)
            $temp[$type_key] = [];

        foreach ($this->credit['Canvas'] as $state_key => $state_value)
            foreach ($this->credit['Canvas'][$state_key] as $type_key => $type_value)
                $temp[$type_key][$state_key] = $type_value;

        $this->credit['Canvas'] = $temp;
        
        //增加start key
        foreach ($this->credit['Canvas'] as $type_key => $type_value)
            foreach ($this->credit['Canvas'][$type_key] as $state_key => $state_value)
                $this->credit['Canvas'][$type_key][$state_key]['start'] = 0;

        //此數數值為遞增後的，所以回傳的數值直接可以繪圖
        foreach ($this->credit['Canvas'] as $type_key => $type_value) {
            $temp = 0;
            foreach ($this->credit['Canvas'][$type_key] as $state_key => $state_value) {
                $this->credit['Canvas'][$type_key][$state_key]['start'] +=$temp;
                $this->credit['Canvas'][$type_key][$state_key]['end'] += $this->credit['Canvas'][$type_key][$state_key]['start'];
                $temp = $this->credit['Canvas'][$type_key][$state_key]['end'];
            }
        }
    }

    public function getCredit()
    {
        $this->credit = [];

        $this->credit+=$this->getCreditPerType();
        $this->credit+=$this->addFieldOfTotalCredit($this->credit);
        $this->credit['總學分']=$this->getCreditOfForce($this->credit['總學分']);
        $this->credit['總學分']=$this->getCreditOfCommonAndElective($this->credit['總學分']);
        //need refactory
        $this->getCreditOfRemainAndState();
        $this->separateCreditBetweenTotalAndOther();
        $this->calcPercentagesForCanvas();

        return $this->credit;
    }

    //--------------------
    public function getThresholdOfForce()
    {
        $temp = [];
        $threshold_list = (new Threshold1)->instance()->suitUnit($this->user_unit_ids[0])->get()->values();
        for ($i = 0; $i < count($threshold_list); $i++) {
            $temp[$i] = [];
            $temp[$i]['id'] = $threshold_list[$i]->course_base->id;
            $temp[$i]['課程名稱'] = $threshold_list[$i]->course_base->name;
            $temp[$i]['學分'] = $threshold_list[$i]->course_base->credit;
            $temp[$i]['修別'] = $threshold_list[$i]->type->name;
            $temp[$i]['學期'] = $threshold_list[$i]->adopt_grade . ' - ' . $threshold_list[$i]->adopt_semester;
        }

        return $temp;
    }

    public function getCurriculumOfOwn()
    {
        $curriculum = (new Curriculum())->instance()->suitOwn($this->user_id)->get()->values();

        return $curriculum;
    }

    public function exceptOwnCurriculumFromThresholdOfForce()
    {
        $threshold= $this->getThresholdOfForce();
        $curriculum = $this->getCurriculumOfOwn();
        $excepted = [];
        $k = 0;
        for ($i = 0; $i < count($threshold); $i++) {
            $has = false;
            foreach ($curriculum as $c)
                if ($threshold[$i]['id'] == $c->course->course_base_id)
                    $has = true;
            if (!$has) {
                $excepted[$k] = [];
                $excepted[$k]['課程名稱'] = $threshold[$i]['課程名稱'];
                $excepted[$k]['學期'] = $threshold[$i]['學期'];
                $excepted[$k]['學分'] = $threshold[$i]['學分'];
                $excepted[$k]['修別'] = $threshold[$i]['修別'];
                $k++;
            }
        }

        return $excepted;
    }

    public function getForceList()
    {
        $list = $this->exceptOwnCurriculumFromThresholdOfForce();

        $temp = [];
        $temp['必修'] = [];
        $temp['必選修'] = [];
        $temp['共必修'] = [];
        $i = 0;
        foreach ($list as $key => $value) {
            $temp[$value['修別']][$i] = $list[$key];
            unset($temp['修別']);
            $i++;
        }

        return $temp;
    }

    //--------------------
    public function getList()
    {
        return $this->result;
    }
}
