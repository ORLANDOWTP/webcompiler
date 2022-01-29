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
      int a = 30;
      int b = 45;
      System.out.println("Before swapping, a = " + a + " and b = " + b);

      // Call function swap
      swapFunction(a, b);
      System.out.println("\n**Now, Before and After swapping values will be same here**:");
      System.out.println("After swapping, a = " + a + " and b is " + b);
   }

   public static void swapFunction(int a, int b) {
      System.out.println("Before swapping(Inside), a = " + a + " b = " + b);
      
      // Swap n1 dengan n2
      int c = a;
      a = b;
      b = c;
      System.out.println("After swapping(Inside), a = " + a + " b = " + b);
   }
}