using System;

/* -------------------------------------------------------------------------- */
/*                   CARA INISIALISAI JAGGED ARRAY PADA BAHASA C#             */
/* -------------------------------------------------------------------------- */       
/* int[][] time = new int[2][]{                                               */
/*                               new int[]{60,120,90},new int[]{85,65,88,71}  */
/*                            };                                              */
/* -------------------------------------------------------------------------- */


namespace ArrayApplication
{
   class MyArray
   {
      static void Main(string[] args)
      {
         /* Berikut merupakan sebuah jagged array yg terdiri dari 5 array integer */
         int[][] a = new int[][]{new int[]{0,0},new int[]{1,2},new int[]{2,4},new int[]{ 3, 6 }, new int[]{ 4, 8 } };
         int i, j;
         
         /* Print nilai elemen dari setiap array */
         for (i = 0; i < 5; i++)
         {
            for (j = 0; j < 2; j++)
            {
               Console.WriteLine("a[{0}][{1}] = {2}", i, j, a[i][j]);
using StreamWriter writer0 = new("result.txt", append: true);
writer0.writeLine("{0:N}#{1:N}#{2:N},0,27,a[i][j]");
            }
         }
         Console.ReadKey();
      }
   }
}
