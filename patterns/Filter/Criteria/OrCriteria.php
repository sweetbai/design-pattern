<?php

namespace Patterns\Filter\Criteria;

/**
 * Class OrCriteria.
 */
class OrCriteria implements Criteria
{
    protected $criteria;
    protected $otherCriteria;

    /**
     * OrCriteria constructor.
     *
     * @param Criteria $criteria
     * @param Criteria $otherCriteria
     */
    public function __construct(Criteria $criteria, Criteria $otherCriteria)
    {
        $this->criteria = $criteria;
        $this->otherCriteria = $otherCriteria;
    }

    /**
     * @param \Patterns\Filter\Person[] $persons
     *
     * @return \Patterns\Filter\Person[] $persons
     */
    public function meet(array $persons)
    {
        $firstCriteriaPersons = $this->criteria->meet($persons);
        $secondCriteriaPersons = $this->otherCriteria->meet($persons);

        return array_merge($firstCriteriaPersons, $secondCriteriaPersons);
    }
}
