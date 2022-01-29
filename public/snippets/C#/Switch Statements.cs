using System;

/* -------------------------------------------------- */
/*      SYNTAX SWITCH STATEMENT PADA BAHASA C#        */
/* -------------------------------------------------- */
/*  switch(expression) {                              */
/*                                                    */
/*     case constant-expression  :                    */
/*        statement(s);                               */
/*        break; // optional                          */ 
/*                                                    */
/*     case constant-expression  :                    */
/*        statement(s);                               */
/*        break; // optional                          */
/*                                                    */
/*     default : // Optional                          */
/*     statement(s);                                  */
/*  }                                                 */
/* -------------------------------------------------- */

namespace DecisionMaking
{
   class Program
   {
      static void Main(string[] args)
      {
         /* Deklarasi variabel lokal */
         char grade = 'B';
         
         switch (grade)
         {
            case 'A':
               Console.WriteLine("Excellent!");
               break;
            case 'B':
            case 'C':
               Console.WriteLine("Well done");
               break;
            case 'D':
               Console.WriteLine("You passed");
               break;
            case 'F':
               Console.WriteLine("Better try again");
               break;
               default:
            Console.WriteLine("Invalid grade");
               break;
         }
         Console.WriteLine("Your grade is  {0}", grade);
         Console.ReadLine();
      }
   }
}