//using System.Collections;
//using System.Collections.Generic;
//using System.Linq;
//using UnityEngine;

//public class LevelCreator : MonoBehaviour
//{
//    [SerializeField] int difficulty;
//    [SerializeField] Sprite[] tileSprites;
//    [SerializeField] private Tile tilePrefab;
//    [SerializeField] Transform tiles;

//    TileManager T;

//    List<Slot> slots;

//    List<int> randomNumbers;

//    private void Start()
//    {
//        T = tiles.GetComponent<TileManager>();

//        //slots = new List<Slot>();
//        //GenerateSlots();

//        //randomNumbers = new List<int>();
//        //GenerateRandomNumbers();

//        //InsertTiles();
//    }

//    void GenerateRandomNumbers()
//    {
//        /*
//           TAM ZOR - [80]
//           ZOR [55] [S25]
//           ORTA [30] [25] [S25]
//           KOLAY [14] [41] [S25]
//        */


//        List<int> generatedRandomNumbers = new List<int>();

//        if (difficulty == 3) GenerateIV();
//        else if (difficulty == 2) GenerateIII();
//        else if (difficulty == 1) GenerateII();
//        if (difficulty == 0) GenerateI();

//        randomNumbers = generatedRandomNumbers;


//        void GenerateIV()
//        {
//            Debug.Log("GENERATING WHOLE LEVEL...");
//            int count = 0;
//            for (int i = 1; i <= 80; i++) // 80 deðiþicek
//            {
//                int value = Random.Range(1, 12);
//                count += value;
//                generatedRandomNumbers.Add(value);
//                //randomNumbers.Add(value);
//            }

//            if (count % 21 != 0)  // BURA ZATEN FULL GÝDÝCEK USTA
//            {
//                //randomNumbers.Clear();
//                generatedRandomNumbers.Clear();
//                GenerateIV();
//            }
//        }

//        void GenerateIII()
//        {
//            Debug.Log("GENERATING SECOND PYRAMID PART...");

//            int count = 0;
//            for (int i = 1; i <= 55; i++)
//            {
//                int value = Random.Range(1, 12);
//                count += value;
//                generatedRandomNumbers.Add(value);
//            }

//            if (count % 21 != 0)
//            {
//                generatedRandomNumbers.Clear();
//                GenerateIII();
//            }
//            else GenerateStacks();
//        }

//        void GenerateII()
//        {
//            Debug.Log("GENERATING FIRST PYRAMID PART...");

//            int count = 0;
//            for (int i = 1; i <= 30; i++)
//            {
//                int value = Random.Range(1, 12);
//                count += value;
//                generatedRandomNumbers.Add(value);
//            }

//            if (count % 21 != 0)
//            {
//                generatedRandomNumbers.Clear();
//                GenerateII();
//            }
//            else ContinueGenerateII();

//            void ContinueGenerateII()
//            {
//                Debug.Log("GENERATING SECOND PYRAMID PART...");

//                List<int> temporaryList = new List<int>();
//                int count = 0;
//                for (int i = 31; i <= 55; i++)
//                {
//                    int value = Random.Range(1, 12);
//                    count += value;
//                    temporaryList.Add(value);
//                }

//                if (count % 21 != 0) ContinueGenerateII();
//                else
//                {
//                    foreach (int number in temporaryList)
//                    {
//                        generatedRandomNumbers.Add(number);
//                    }

//                    GenerateStacks();
//                }
//            }
//        }

//        void GenerateI()
//        {
//            Debug.Log("GENERATING FIRST BASIC PYRAMID PART...");

//            int count = 0;
//            for (int i = 1; i <= 14; i++)
//            {
//                int value = Random.Range(1, 12);
//                count += value;
//                generatedRandomNumbers.Add(value);
//            }

//            if (count % 21 != 0)
//            {
//                generatedRandomNumbers.Clear();
//                GenerateI();
//            }
//            else ContinueGenerateI();

//            void ContinueGenerateI()
//            {
//                Debug.Log("GENERATING SECOND PYRAMID PART...");

//                List<int> temporaryList = new List<int>();
//                int count = 0;
//                for (int i = 15; i <= 55; i++)
//                {
//                    int value = Random.Range(1, 12);
//                    count += value;
//                    temporaryList.Add(value);
//                }

//                if (count % 21 != 0) ContinueGenerateI();
//                else
//                {
//                    foreach (int number in temporaryList)
//                    {
//                        generatedRandomNumbers.Add(number);
//                    }

//                    GenerateStacks();
//                }
//            }
//        }

//        void GenerateStacks()
//        {
//            Debug.Log("GENERATING STACKS...");

//            List<int> temporaryList = new List<int>();
//            int count = 0;
//            for (int i = 56; i <= 80; i++)
//            {
//                int value = Random.Range(1, 12);
//                count += value;
//                temporaryList.Add(value);
//            }

//            if (count % 21 != 0) GenerateStacks();
//            else
//            {
//                foreach (int number in temporaryList)
//                {
//                    generatedRandomNumbers.Add(number);
//                }
//            }
//        }
//    }

//    void InsertTiles()
//    {
//        int count = 0;
//        foreach (int num in randomNumbers)
//        {
//            var sprite = SelectTile(num);
//            var tile = Instantiate(tilePrefab, tiles);

//            Slot slot = slots[count];

//            tile.SetTileValue(num, sprite);
//            tile.x = slot.x;
//            tile.z = slot.layer;
//            tile.y = slot.z;

//            if (count < 55) tile.isStacked = false;
//            else tile.isStacked = true;

//            T.Add(tile);

//            count++;
//        }

//        //T.UnlockTop();

//        Sprite SelectTile(int num)
//        {
//            return tileSprites[num - 1];
//        }
//    }

//    void GenerateSlots()
//    {
//        slots.Add(new Slot(2, 2, 4)); // TOP LAYER (1)

//        for (float i = 1.5F; i <= 2.5F; i++) // LAYER 3 (4)
//        {
//            for (float j = 1.5F; j <= 2.5F; j++)
//            {
//                slots.Add(new Slot(i, j, 3));
//            }
//        }

//        for (int i = 1; i <= 3; i++) // LAYER 2 (9)
//        {
//            for (int j = 1; j <= 3; j++)
//            {
//                slots.Add(new Slot(i, j, 2));
//            }
//        }

//        for (float i = 0.5F; i <= 3.5F; i++) // LAYER 1 (16)
//        {
//            for (float j = 0.5F; j <= 3.5F; j++)
//            {
//                slots.Add(new Slot(i, j, 1));
//            }
//        }

//        for (int i = 0; i <= 4; i++) // LAYER 0 (25)
//        {
//            for (int j = 0; j <= 4; j++)
//            {
//                slots.Add(new Slot(i, j, 0));
//            }
//        }

//        for (int j = 4; j >= 0; j--) // STACKS
//        {
//            for (int i = 0; i <= 4; i++)
//            {
//                slots.Add(new Slot(i, 5, j));
//            }
//        }
//    }

//    public class Slot
//    {
//        public float x;
//        public float z;
//        public int layer;

//        public Slot(float x, float z, int layer)
//        {
//            this.x = x;
//            this.z = z;
//            this.layer = layer;
//        }
//    }
//}
