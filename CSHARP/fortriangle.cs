using System;

namespace MyApplication
{
    class Program
    {
        static void Main(string[] args)
        {
            int i, k;

            for (i = 0; i < 10; i++)
            {
                for (k = 0; k <= i; k++)
                {
                    Console.Write('#');
                }
                Console.WriteLine();
            }
        }
    }
}
