# DIVING COMPETITION - KATA

Just a simple kata inspired by Kazan 2015 diving competition

```
$dive = new Dive(2.0);
$strategy = new NoBestAndWorstStrategy();

$manager = new VotingManager($strategy);
$totalScore = $manager->getTotalScoreFor([8,8,6,7,8], $dive);
```

## Validation process

```
$dive = new Dive(2.0);
$strategy = new NoBestAndWorstStrategy();

$validationChain = new ValidatorvalidationChain();
$validationChain->append(new IsNumericValidator());
$validationChain->append(new GreaterOrEqualThanValidator(0));
$validationChain->append(new LessOrEqualThanValidator(10));

$manager = new VotingManager($strategy, $validationChain);
$totalScore = $manager->getTotalScoreFor([8,8,6,7,8], $dive);
```

## Evolutions

 * We have 5 voters, the best and worst votes will be removed. Sum up all
     remaining votes and multiply by the dive score.
 * We have also a new rule, 7 voters. Now, 2 best and 2 worst votes will be
     removed then sum up all remaining votes and multiply by the dive score.
 * Add data validation, votes should be float or integer numbers and those
     figures should be between 0 and 10.

