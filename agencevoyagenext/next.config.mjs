/** @type {import('next').NextConfig} */
const nextConfig = {
    output: 'export',
    images: {
        remotePatterns: [
          {
            protocol: "http",
            hostname: "localhost",
            port: "8000",
          },
        ],
      },
};

export default nextConfig;
