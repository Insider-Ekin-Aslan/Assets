List<Tile> RecursiveLayerByLayer21Finder(int sum, int currentLayer, int beforeLayerINumber, int tryOutAmount, List<Tile> returnList)
        {
            Debug.Log(">>RSTART   sum:" + sum + " currentLayer:" + currentLayer + " beforeI:" + beforeLayerINumber + " tryout:" + tryOutAmount);
            string tiles = "";
            foreach(Tile tile in returnList)
            {
                tiles += tile.value + " ";
            }

            Debug.Log("tiles: " + tiles);


            for (int i = beforeLayerINumber + 1; i < newList.Count - (tryOutAmount - 1); i++) //hhghg
            {
                sum += newList[i].value;
                returnList.Add(newList[i]);

                if (currentLayer == tryOutAmount)
                {
                    if (sum == 21)
                    {
                        return returnList;
                    }
                    else
                    {
                        Debug.Log("- finished amount lap, continuing with other");
                        Debug.Log("-- removing " + newList[i].value);
                        sum -= newList[i].value;
                        returnList.Remove(newList[i]);
                        continue;
                    }
                }
                else
                {
                    if (sum == 21)
                    {
                        return returnList;
                    }
                    else if (sum > 21)
                    {
                        Debug.Log("- finished one lap, continuing with same amount");
                        Debug.Log("-- removing " + newList[i].value);
                        sum -= newList[i].value;
                        returnList.Remove(newList[i]);
                        continue;
                    }
                    else
                    {
                        Debug.Log("_-_ TRY AMOUNT = " + tryOutAmount + " _-_");
                        Debug.Log("_-_ CURRENT LAYER = " + currentLayer + " _-_");
                         

                        // GO DEEPER IF YOU CAN
                        if (currentLayer < tryOutAmount)
                        {
                            Debug.Log("--- going deeper !");
                            return RecursiveLayerByLayer21Finder(sum, currentLayer + 1, i, tryOutAmount, returnList);
                        }
                        // IF IS NOT TRY -1 AMOUNT
                        else if (tryOutAmount - 1 > 1)
                        {
                            Debug.Log("--- trying again with lower amount !");
                            Debug.Break();
                            return RecursiveLayerByLayer21Finder(0, 1, -1, tryOutAmount - 1, new List<Tile>());
                        }
                        // IMPOSSIBLE
                        else
                        {
                            Debug.Log("--- impossible !");
                            return null;
                        }
                    }
                }
            }
            Debug.Log("---- IMPOSSIBLE ! ALL THE WAY DOWN");

            // ÖRNEKTEKİ YERDEN DEVAM ETMESİNİ SAĞLAYACAK KOD GEREKLİ

            return null;
        }