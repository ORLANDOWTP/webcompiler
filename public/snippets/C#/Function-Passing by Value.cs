using System;

/* -------------------------------------------------------------------------------------------------------------- */
/*                                  Function - Passing Parameter by Value                                         */
/* -------------------------------------------------------------------------------------------------------------- */
/* Dalam mekanisme ini, ketika metode ini dipanggil, lokasi penyimpanan baru dibuat untuk setiap parameter nilai. */
/* Nilai-nilai parameter yang sebenarnya akan disalin ke penyimpanan tersebut.                                    */
/* Oleh karena itu, perubahan yang dibuat kepada parameter dalam metode tidak berpengaruh pada argumen.           */
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
      public void swap(int x, int y)
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
         n.swap(a, b);
         
         Console.WriteLine("After swap, value of a : {0}", a);
         Console.WriteLine("After swap, value of b : {0}", b);
         
         Console.ReadLine();
      }
   }
}