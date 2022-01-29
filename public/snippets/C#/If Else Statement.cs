using System;

/*  ----------------------------------------------------------------  */
/*             SYNTAX IF ELSE STATEMENT PADA BAHASA C#                 */
/*  ----------------------------------------------------------------  */
/*  if(boolean_expression) {                                          */               
/*     --    statement(s) akan dijalankan jika boolean = true     --  */
/*  }                                                                 */
/*  else if(boolean_expression){                                      */
/*     --    statement(s) akan dijalankan jika boolean = true     --  */  
/*  }                                                                 */
/*  else{                                                             */
/*     -- statement(s) akan dijalankan jika semua boolean = false --  */  
/*  }                                                                 */
/*  ----------------------------------------------------------------  */

namespace DecisionMaking
{
   class Program 
   {
      static void Main(string[] args)
      {
         /* Deklarasi variabel lokal */
         int a = 100;
         
         /* Cek kondisi boolean apakah true/false*/
         if (a == 10)
         {
            /* Jika kondisi boolean terpenuhi (true) */
            /* Jika false, lanjut ke kondisi boolean selanjutnya */
            Console.WriteLine("Value of a is 10");
         }
         
         else if (a == 20)
         {
            /* Jika kondisi boolean terpenuhi (true) */
            /* Jika false, lanjut ke kondisi boolean selanjutnya */
            Console.WriteLine("Value of a is 20");
         }
         
         else if (a == 30)
         {
            /* Jika kondisi boolean terpenuhi (true) */
            /* Jika false, lanjut ke kondisi boolean selanjutnya */
            Console.WriteLine("Value of a is 30");
         }
         
         else
         {
            /* Jika kondisi boolean terpenuhi (true) */
            /* Jika false, lanjut ke kondisi boolean selanjutnya */
            Console.WriteLine("None of the values is matching");
         }
         Console.WriteLine("Exact value of a is: {0}", a);
         Console.ReadLine();
      }
   }
}