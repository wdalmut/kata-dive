# DIVING COMPETITION - KATA

Just a simple kata inspired by Kazan 2015 diving competition

```
$dive = new Dive(2.0);
$strategy = new NoBestAndWorstStrategy();

$manager = new VotingManager($strategy);
$totalScore = $manager->getTotalScoreFor([8,8,6,7,8], $dive);
```

## Evolutions

1) We have 5 voters, the best and worst votes will be removed. Sum up all
remaining votes and multiply by the dive score.
2) We have also a new rule, 7 voters. Now, 2 best and 2 worst votes will be
removed then sum up all remaining votes and multiply by the dive score.

