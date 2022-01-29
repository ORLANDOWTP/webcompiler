using System;

/* -------------------------------------- */
/* Cara deklarasi array 2 atau 3 dimensi  */
/* -------------------------------------- */
/* 2 dimensi :                            */
/*   string [,] names;                    */
/* -------------------------------------- */
/* 3 dimensi :                            */
/*   int [ , , ] m;                       */
/* -------------------------------------- */

/* ----------------------------------------------------------------------------------------- */
/*                      Cara inisialisasi multidimensional array                            */
/* ----------------------------------------------------------------------------------------- */
/* int [,] a = new int [3,4] {                                                               */
/*                             {0, 8, 7, 3} ,   //  initializers untuk baris dengan index 0  */
/*                             {1, 6, 3, 7} ,   //  initializers untuk baris dengan index 0  */
/*                             {9, 2, 1, 11}    //  initializers untuk baris dengan index 0  */
/*             };                                                                            */
/* ----------------------------------------------------------------------------------------- */


namespace ArrayApplication
{
   class MyArray
   {
      static void Main(string[] args)
      {
         /* Sebuah array dengan 5 baris dan 2 kolom */
         int[,] a = new int[5, 2] {{0,0}, {1,2}, {2,4}, {3,6}, {4,8} };
         int i, j;
         
         /* Print output untuk nilai elemen dari tiap array */
         for (i = 0; i < 5; i++)
         {
            for (j = 0; j < 2; j++)
            {
               Console.WriteLine("a[{0},{1}] = {2}", i, j, a[i,j]);
            }
         }
         Console.ReadKey();
      }
   }
}