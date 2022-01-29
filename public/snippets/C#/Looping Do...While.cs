using System;

/* ------------------------------------------- */
/*  SYNTAX LOOPING DO...WHILE PADA BAHASA C#   */
/* ------------------------------------------- */
/*       do {                                  */
/*             statement(s);                   */
/*       } while( condition );                 */
/* ------------------------------------------- */

namespace Loops
{
   class Program
   {
      static void Main(string[] args)
      {
         /* Deklarasi Variabel Lokal */
         int a = 10;
         
         /* Do..While dilakukan */
         do
         {
            Console.WriteLine("value of a: {0}", a);
            a = a + 1;
         } 
         while (a < 20);
         Console.ReadLine();
      }
   }
} 