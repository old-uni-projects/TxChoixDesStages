select stage, count(*) as 'max_demand' FROM `votes` group by `stage` order by max_demand DESC limit 1