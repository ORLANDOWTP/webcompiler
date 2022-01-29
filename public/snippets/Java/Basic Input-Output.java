/* ---------------------------------------------------------------------------- */
/* 					Beberapa jenis method dari class Scanner 					*/
/* ---------------------------------------------------------------------------- */
/* public String next()		  || it returns the next token from the scanner.	*/									
/* public String nextLine()   || it moves the scanner position to the next line */
/*							  || and returns the value as a string.				*/
/* public byte nextByte()     || it scans the next token as a byte.				*/
/* public short nextShort()	  || it scans the next token as a short value.		*/
/* public int nextInt()	      || it scans the next token as an int value.		*/
/* public long nextLong()	  || it scans the next token as a long value.		*/
/* public float nextFloat()	  || it scans the next token as a float value.		*/
/* public double nextDouble() || it scans the next token as a double value.		*/
/* ---------------------------------------------------------------------------- */

import java.util.Scanner;  

class /* your file name */{ 
    
 public static void main(String args[]){  
   Scanner sc=new Scanner(System.in);  
     
   System.out.println("Enter your rollno");  
   int rollno=sc.nextInt();
   sc.nextLine(); //disarankan setiap menggunakan method dari class Scanner, tambahkan nextLine();
   
   System.out.println("Enter your name");  
   String name=sc.nextLine();
   sc.nextLine(); //disarankan setiap menggunakan method dari class Scanner, tambahkan nextLine();
   
   //print output dengan System.out.print(string);
   System.out.println("Rollno: "+rollno+" name: "+name); 
   
   sc.close();  
 }  
}