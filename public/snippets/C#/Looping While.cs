using System;

/* ------------------------------------------ */
/*    SYNTAX LOOPING WHILE PADA BAHASA C#     */
/* ------------------------------------------ */
/*          while(condition) {                */
/*             statement(s);                  */
/*          }                                 */
/* ------------------------------------------ */

namespace Loops 
{
   class Program
   {
      static void Main(string[] args)
      {
         /* Deklarasi variabel lokal */
         int a = 10;

         /* While Looping dijalankan */
         while (a < 20)
         {
            Console.WriteLine("value of a: {0}", a);
            a++;
         }
         Console.ReadLine();
      }
   }
}