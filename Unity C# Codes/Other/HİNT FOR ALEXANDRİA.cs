int sum = 0;
        foreach(Tile tile in tiles)
        {
            sum += tile.value;
            if (sum >= 21) break;
        }
        if (sum < 21)
        {
            Debug.LogError("WRITE THAT CODE");

            // DEBATE SHIT

        }
        sum = 0;

        var rest = tiles.OrderBy(tile => tile.value).ToList();
        var executeList = new List<Tile>();

        for(int i = 0; i < selecteds.Count; i++)
        {
            sum += selecteds[i].value;
        }

        Debug.Log("bize lazım " + (21 - sum));

        var combinations = GetCombination(21 - sum);

        if (combinations == null || combinations.Count() == 0) ////////////////
        {
            Debug.LogError("COMBINATIONS CAN NOT BE NULL");
            Debug.Break();
        }

        for (int i = 0; i < combinations.Count; i++)
        {
            var count = 0;
            var combination = combinations[i];
            var restCopy = new List<Tile>(rest);
            var toExecute = new List<Tile>();

            string test = "";
            foreach(int a in combination)
            {
                test += a + " ";
            }
            Debug.Log("TEST: " + test);

            for(int j = 0; j < combination.Count; j++)
            {
                var number = combination[j];
                Debug.Log("FOR >> number-" + number);

                for(int k = 0; k < restCopy.Count; k++)
                {
                    var tile = restCopy[k];
                    Debug.Log("FOR >> number-" + number + " value-" + tile.value);
                    if (number == tile.value)
                    {
                        count++;
                        restCopy.Remove(tile);
                        toExecute.Add(tile);
                        break;
                    }
                }
            }

            if (combination.Count == count)
            {
                for(int j = 0; j < toExecute.Count; j++)
                {
                    executeList.Add(toExecute[j]);
                }

                break;
            }
        }

        if (executeList == null || executeList.Count == 0)
        {
            Debug.Log("BULAMADI MÜBAREK");
            Debug.LogError("EXECUTELIST CAN NOT BE EMPTY");
            Debug.Break();
        }
        else
        {
            Execute();
        }

        List<List<int>> GetCombination(int sum)
        {
            static List<List<int>> CombinationSum(List<int> list, int sum)
            {
                List<List<int>> returned = new List<List<int>>();
                List<int> temporary = new List<int>();

                HashSet<int> set = new HashSet<int>(list);
                list.Clear();
                list.AddRange(set);
                list.Sort();

                FindNumbers(returned, list, sum, 0, temporary);
                return returned;
            }

            static void FindNumbers(List<List<int>> returned, List<int> list, int sum, int index, List<int> temporary)
            {
                if (sum == 0)
                {
                    returned.Add(new List<int>(temporary));
                    return;
                }

                for (int i = index; i < list.Count; i++)
                {
                    if ((sum - list[i]) >= 0)
                    {
                        temporary.Add(list[i]);

                        FindNumbers(returned, list, sum - list[i], i, temporary);
                        temporary.Remove(list[i]);
                    }
                }
            }

            List<int> list = new List<int>();

            for(int i = 1; i <= 11; i++)
            {
                list.Add(i);
            }

            List<List<int>> combination = CombinationSum(list, sum);

            if (combination.Count == 0) return null;
            else
            {
                combination.OrderBy(list => -list.Count).ToList();
                combination.Reverse();
                return combination;
            }
        }

        void Execute()
        {
            for(int i = 0; i < executeList.Count; i++)
            {
                Tile tile = executeList[i];
                tile.Unlock();
                StartCoroutine(Delay(tile, i));
                //tile.OnPop?.Invoke(tile);
            }

            IEnumerator Delay(Tile tile, int delay)
            {
                yield return new WaitForSecondsRealtime(delay);
                tile.OnPop?.Invoke(tile);
            }
        }