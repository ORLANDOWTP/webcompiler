using System;

/* -------------------------------------------------------------------------------------------------------------- */
/*                                  Function - Passing Parameter by Reference                                     */
/* -------------------------------------------------------------------------------------------------------------- */
/* Sebuah reference parameter merupakan sebuah referensi kepada lokasi memori dari variabel.                      */
/* Pada saat memanggil method dengan passing by reference, sebuah storage tidak dibuat utk parameter ini.         */
/* Hal itu karena reference parameter merepresentasikan lokasi memori yang sama dengan parameter sebenarnya yang  */
/* diberikan/dipass ke method ini.                                                                                */
/* -------------------------------------------------------------------------------------------------------------- */

/*  --------------------------------------------------------------  */
/*                  Cara Define Suatu Function/Method               */
/*  --------------------------------------------------------------  */
/*  <Access Specifier> <Return Type> <Method Name>(Parameter List)  */
/*  {                                                               */
/*     Method Body                                                  */
/*  }                                                               */
/*  --------------------------------------------------------------  */

namespace CalculatorApplication
{
   class NumberManipulator
   {
      public void swap(ref int x, ref int y)
      {
         int temp;

         temp = x; /* Menyimpan nilai dari x pada temp */
         x = y;    /* Taruh/copy y kedalam x */
         y = temp; /* Taruh/copy temp kepada y */
      }
   
      static void Main(string[] args)
      {
         NumberManipulator n = new NumberManipulator();
         
         /* Deklarasi variabel lokal */
         int a = 100;
         int b = 200;

         Console.WriteLine("Before swap, value of a : {0}", a);
         Console.WriteLine("Before swap, value of b : {0}", b);

         /* Function Swap dipanggil */
         n.swap(ref a, ref b);

         Console.WriteLine("After swap, value of a : {0}", a);
         Console.WriteLine("After swap, value of b : {0}", b);
 
         Console.ReadLine();

      }
   }
}