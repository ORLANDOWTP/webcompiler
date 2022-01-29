
/* -------------------------------------------------- */
/*      SYNTAX SWITCH STATEMENT PADA BAHASA JAVA      */
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

public class /* your file name */ {

   public static void main(String args[]) {
      
      char grade = 'C';

      switch(grade) {
         case 'A' :
            System.out.println("Excellent!"); 
            break;
         case 'B' :
         case 'C' :
            System.out.println("Well done");
            break;
         case 'D' :
            System.out.println("You passed");
         case 'F' :
            System.out.println("Better try again");
            break;
         default :
            System.out.println("Invalid grade");
      }
      System.out.println("Your grade is " + grade);
   }
}