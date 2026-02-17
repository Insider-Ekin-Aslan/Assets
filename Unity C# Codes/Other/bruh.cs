void UnlockOthers()
        {
            var x = tile.x;
            var y = tile.y;
            var z = tile.z;

            if (!tile.isStacked)
            {
                bool top, right, bottom, left, cornerTL, cornerTR, cornerBL, cornerBR;
                cornerBR = cornerBL = cornerTR = cornerTL = left = bottom = right = top = true;

                foreach (Tile other in tiles)
                {
                    if (!other.isStacked && z == other.z)
                    {
                        bool uLeft, uRight, uTop, uBottom, eqX, eqY;
                        eqY = eqX = uBottom = uTop = uRight = uLeft = false;

                        if (y - 1 == other.y) uTop = true;
                        if (y + 1 == other.y) uBottom = true;
                        if (x - 1 == other.x) uLeft = true;
                        if (x + 1 == other.x) uRight = true;
                        if (x == other.x) eqX = true;
                        if (y == other.y) eqY = true;

                        if (uTop && eqX) top = false;
                        else if (uBottom && eqX) bottom = false;
                        else if (uLeft && eqY) left = false;
                        else if (uRight && eqY) right = false;
                        else if (uTop && uLeft) cornerTL = false;
                        else if (uTop && uRight) cornerTR = false;
                        else if (uBottom && uLeft) cornerBL = false;
                        else if (uBottom && uRight) cornerBR = false;
                    }
                }

                //Debug.Log(cornerTL + " " + cornerTR + " "+ cornerBL +" "+ cornerBR);

                foreach (Tile other in tiles)
                {
                    if (!other.isStacked && z - 1 == other.z)
                    {
                        bool T = y - .5F == other.y;
                        bool B = y + .5F == other.y;
                        bool L = x - .5F == other.x;
                        bool R = x + .5F == other.x;

                        bool topLeft = top && left && T && L && cornerTL;
                        bool topRight = top && right && T && R && cornerTR;
                        bool bottomLeft = bottom && left && B && L && cornerBL;
                        bool bottomRight = bottom && right && B && R && cornerBR;

                        if (topLeft || topRight || bottomLeft || bottomRight) other.Unlock();
                    }
                }
            }
            else
            {
                foreach (Tile other in tiles)
                {
                    if (other.isStacked && z - 1 == other.z && x == other.x && y == tile.y)
                    {
                        other.Unlock();
                        break;
                    }
                }
            }
        }