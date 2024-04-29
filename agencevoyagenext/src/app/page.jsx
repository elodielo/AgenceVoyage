import Image from "next/image";
import styles from "./page.module.css";
import Navbar from "@/components/Navbar";
import Entete from "@/components/Entete";
import Footer from "@/components/includes/footer";
import Body from "@/components/includes/Body";

export default function Home() {
  return (
    <>
    <Navbar />
    <Entete />
    <Body />
    <Footer />
    </>
  );
}
