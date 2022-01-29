/* ------------------------------------------- */
/*  SYNTAX LOOPING DO...WHILE PADA BAHASA C#   */
/* ------------------------------------------- */
/*       do {                                  */
/*             statement(s);                   */
/*       } while( condition );                 */
/* ------------------------------------------- */

public class /* your file name */ {

   public static void main(String args[]) {
      int x = 10;

      do {
         System.out.print("value of x : " + x );
         x++;
         System.out.print("\n");
      }while( x < 20 );
   }
}