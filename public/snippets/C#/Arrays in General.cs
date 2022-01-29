using System;

/* -------------------------------------------- */
/*       Deklarasi Array dalam bahasa C#        */
/* -------------------------------------------- */
/* datatype[] arrayName;                        */
/* Contoh :                                     */
/*          double[] credit = new double[10];   */
/* -------------------------------------------- */

/* ------------------------------------------------------ */
/*       Beberapa Cara Assign Value ke dalam Array        */
/* ------------------------------------------------------ */
/* 1.) int [] marks = new int[]  { 99,  98, 92, 97, 95};  */
/* 2.) int [] marks = new int[5]  { 99,  98, 92, 97, 95}; */
/* 3.) double[] credit = new double[10];                  */
/*     credit[0] = 4500.0;                                */
/* ------------------------------------------------------ */

namespace ArrayApplication
{
   class MyArray
   {
      static void Main(string[] args)
      {
         int []  n = new int[10]; /* n adalah sebuah array 10 integer */
         int i,j;

         /* initialize elements of array n */
         for ( i = 0; i < 10; i++ )
         {
            n[ i ] = i + 100;
         }
         
         /* output each array element's value */
         for (j = 0; j < 10; j++ )
         {
            Console.WriteLine("Element[{0}] = {1}", j, n[j]);
         }
         Console.ReadKey();
      }
   }
}