using System;

namespace MyApplication
{
    class Program
    {
        static int PlusMethod(int x, int y)
        {
            return x + y;
        }

        static double PlusMethod(double x, double y)
        {
            return x + y;
        }

        static int MyMethod(int x)
        {
            Console.WriteLine("Execute order 66");
            return 66 + x;
        }

        static void Main(string[] args)
        {
            int myNum1 = PlusMethod(8, 5);
            double myNum2 = PlusMethod(4.3, 6.26);
            Console.WriteLine("Int: " + myNum1);
            Console.WriteLine("Double: " + myNum2);
            Console.WriteLine(MyMethod(7));
            Console.WriteLine(MyMethod(10));
        }
    }
}
