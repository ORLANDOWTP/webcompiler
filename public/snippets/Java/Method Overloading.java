/* --------------------------------------------------- */
/*                Cara Membuat Method                  */
/* --------------------------------------------------- */
/* modifier returnType nameOfMethod (Parameter List) { */
/*   // method body                                    */
/* }                                                   */
/* --------------------------------------------------- */
/* Contoh :                                            */
/*    1.) public static int methodName(int a, int b) { */
/*          // body                                    */
/*        }                                            */
/* --------------------------------------------------- */

public class /* your file name */ {

   public static void main(String[] args) {
      int a = 11;
      int b = 6;
      double c = 7.3;
      double d = 9.4;
      
      // nama fungsi sama dengan parameter yang berbeda
      int result1 = minFunction(a, b);
      double result2 = minFunction(c, d);

      System.out.println("Minimum Value = " + result1);
      System.out.println("Minimum Value = " + result2);
   }

   // untuk integer
   public static int minFunction(int n1, int n2) {
      int min;
      if (n1 > n2)
         min = n2;
      else
         min = n1;

      return min; 
   }
   
   // untuk double
   public static double minFunction(double n1, double n2) {
     double min;
      if (n1 > n2)
         min = n2;
      else
         min = n1;

      return min; 
   }
}