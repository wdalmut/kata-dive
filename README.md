# DIVE KATA

Just a simple kata inspired by Kazan dive competition

```
$dive = new Dive(2.0);
$strategy = new NoBestAndWorstStrategy();

$manager = new VotingManager($strategy);
$totalScore = $manager->getTotalScoreFor([8,8,6,7,8], $dive);
```
