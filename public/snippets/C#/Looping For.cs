using System;

/* -------------------------------------- */
/*    SYNTAX LOOPING FOR PADA BAHASA C#   */
/* -------------------------------------- */
/* for ( init; condition; increment ) {   */
/*    statement(s);                       */
/* }                                      */
/* -------------------------------------- */

namespace Loops
{
   class Program
   {
      static void Main(string[] args)
      {
         /* Looping For dijalankan */
         for (int a = 10; a < 20; a = a + 1)
         {
            Console.WriteLine("value of a: {0}", a);
         }
         Console.ReadLine();
      }
   }
} 